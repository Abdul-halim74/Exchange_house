<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Visitor;
use App\Models\VisitorName;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;




class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = DB::select("SELECT users.name,v_name,v_email,v_contact, visiting_reason, v_start_time, v_end_time, visitors.entry_date as visitingDay, visitors.id as v_id, voucher_print,v_image FROM users inner join visitors on users.id=visitors.user_id left join visitor_names on visitors.id=visitor_names.visitor_id ORDER BY visitors.entry_date DESC");
        return view('admin.visitor.index', [
            'visitors' => $visitors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::whereNotIn('role_id', [1, 2])->where('status', 1)->latest()->get();
        return view('admin.visitor.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Webcam Image Insert method
        $webcam_image = $request->input('webcam_image');

        if (!empty($webcam_image)) {
            $folderPath = "support_files/v_image/";
            $image_parts = explode(';base64,', $webcam_image);
            $image_type_aux = explode('image/', $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
            $webcam_file_location = $folderPath . $fileName;
            file_put_contents($webcam_file_location, $image_base64);
        } else {
            $webcam_file_location = '';
        }

        $request->validate([
            'user_id' => 'required',
            'v_company' => 'required',
            'visiting_reason' => 'required',
            'device_carried' => 'required',
            'card_no' => 'required',
            'floor_no' => 'required',
            'v_start_time' => 'required',
        ], [
            'v_company.required' => 'Please enter visitor company name',
            'visiting_reason.required' => 'Please enter visiting reason',
            'device_carried.required' => 'Please enter device carried',
            'card_no.required' => 'Please enter card number',
            'floor_no.required' => 'Please enter floor number',
            'v_start_time.required' => 'Please enter visitor meeting start time',
        ]);
        $v_token = Str::random(13);

        $visitor_id =  Visitor::insertGetId([
            'user_id' => $request->user_id,
            'v_company' => $request->v_company,
            'visiting_reason' => $request->visiting_reason,
            'device_carried' => $request->device_carried,
            'card_no' => $request->card_no,
            'floor_no' => $request->floor_no,
            'v_start_time' => $request->v_start_time,
            'v_end_time' => $request->v_end_time,
            'v_token' => $v_token,
            'v_image' => $webcam_file_location,
            'created_at' => now(),
            'entry_by' => Auth::user()->user_id,
            'request_status' => 0,
            'entry_date' => now()
        ]);

        foreach ($request->moreFields as $addVisitor) {
            VisitorName::create([
                'visitor_id' => $visitor_id,
                'v_name' => $addVisitor['v_name'],
                'v_email' => $addVisitor['v_email'],
                'v_contact' => $addVisitor['v_contact'],
                'created_at' => now()
            ]);
        }
        return back()->with('message', 'visitor Added Successfully!!');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visitor_edit = Visitor::findOrFail($id);
        return view('admin.visitor.edit', compact('visitor_edit'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $photo_update = Visitor::findOrFail($id);
                //Webcam Image Update method
                $webcam_image = $request->input('v_image');

                if (!empty($webcam_image)) {
                    $folderPath = "support_files/v_image/";
                    $image_parts = explode(';base64,', $webcam_image);
                    $image_type_aux = explode('image/', $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    $image_base64 = base64_decode($image_parts[1]);
                    $fileName = uniqid() . '.png';
                    $webcam_file_location = $folderPath . $fileName;
                    file_put_contents($webcam_file_location, $image_base64);
                } else {
                    $webcam_file_location = '';
                }
        $photo_update->v_image = $webcam_file_location;
        $photo_update->save();
        return redirect()->route('visitors.index')->with('massage', 'Image Updated Successfully!!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Employee data show based on id
    public function employeeData(Request $request)
    {
        $emp_id = $request->emp_id;
        $single_visitor_info = DB::select(DB::raw("SELECT u.id,u.name,u.contact, dept.name as department_name FROM `users` u LEFT JOIN departments dept on u.department_id=dept.id WHERE u.id='$emp_id'"))[0];
        return json_encode($single_visitor_info);
    }

    // visitor token generate

    public function visitorToken()
    {
        return view('admin.Card.index');
    }

    //Store exit time for visitor
    public function exitVisitor($id)
    {
        $ok = Visitor::findOrFail($id)->update(['v_end_time' => now()]);
        if ($ok == true) {
            return back()->with('message', 'Visitor leave building successfully!!');
        } else {
            return redirect()->route('admin.customer_auth')->with('message', 'Something went wrong!!');
        }
    }

    //Print card
    public function generateCard($id)
    {
        $card = Visitor::findOrFail($id);
        $v_token  = $card->v_token;
        $visitor = DB::select("SELECT users.name,visitors.id, v_image, v_name,v_email,v_contact, device_carried, visiting_reason, v_start_time, v_end_time, v_company, visitors.entry_date as visitingDay, visitors.id as v_id, voucher_print FROM users inner join visitors on users.id=visitors.user_id inner join visitor_names on visitors.id=visitor_names.visitor_id AND visitors.id= '$id' ORDER BY visitors.entry_date DESC");
        $visitorData = $visitor[0];

        //        $image = base64_encode($visitor[0]->v_image);
        //dd($visitor[0]->v_image);

        //        return view('admin.visitor.card', [
        //            'visitorData' => $visitorData,
        //        ]);

        Visitor::where('id', $id)->update([
            'voucher_print' => 1,
        ]);
        set_time_limit(300);
        $pdf = PDF::loadView('admin.visitor.card', [
            'card' => $card,
            'visitorData' => $visitorData
        ]);
        return $pdf->download($v_token . '.pdf');
    }
    // visitor Photo taken
    public function visitorPhoto($id)
    {
        $photo_edit = Visitor::findOrFail($id);
        return view('admin.Visitor.photoEdit', compact('photo_edit'));
    }
}
