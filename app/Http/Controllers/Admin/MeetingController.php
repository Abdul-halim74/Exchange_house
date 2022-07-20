<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    //Display new visiting request
    public function userWiseRequest() {
        $curUser = Auth::user()->id;
        $visitors = DB::select("SELECT visitors.request_status, users.name,v_name,v_email,v_contact, visiting_reason, v_start_time, v_end_time, visitors.entry_date as visitingDay, visitors.id as v_id, voucher_print FROM users inner join visitors on users.id=visitors.user_id left join visitor_names on visitors.id=visitor_names.visitor_id WHERE visitors.request_status IN (0, 1) and visitors.user_id = '$curUser' ORDER BY visitors.entry_date DESC");
        return view('admin.meeting.new_request',[
            'visitors' => $visitors
        ]);
    }
    //Visitor decline with reason
    public function vDecline(Request $request) {
        $ok = Visitor::where('id', $request->vId)->update(['remarks' => $request->remarks, 'request_status' => 2]);
        if($ok == true) {
            return redirect()->route('admin.user-wise-request')->with('message','Visitor is being declined successfully!!');
        } else {
            return redirect()->route('admin.user-wise-request')->with('message','Something went wrong!!');
        }
    }
    //Visitor accept
    public function vAccept($id) {
        $ok = Visitor::findOrFail($id)->update(['request_status' => 1]);
        if($ok == true) {
            return redirect()->route('admin.user-wise-request')->with('message','Visitor is being accept successfully!!');
        } else {
            return redirect()->route('admin.user-wise-request')->with('message','Something went wrong!!');
        }
    }
    //All request
    public function userWiseAllRequest() {
        $curUser = Auth::user()->id;
        $visitors = DB::select("SELECT users.name,v_name,v_email,v_contact, visiting_reason, v_start_time, v_end_time, visitors.entry_date as visitingDay, visitors.id as v_id, voucher_print FROM users inner join visitors on users.id=visitors.user_id left join visitor_names on visitors.id=visitor_names.visitor_id WHERE visitors.user_id = '$curUser' ORDER BY visitors.entry_date DESC");
        return view('admin.meeting.all_request',[
            'visitors' => $visitors
        ]);
    }

    //Create a new visitor
    public function createUserWiseVisitor() {
        return view('admin.meeting.create');
    }

}

