<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dept = Department::latest()->get();
        return view('admin.department.index',compact('dept'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u'
            ],[
                'name.required' => 'Please enter department name'
            ]);

        $check_department = Department::where('name',$request->name)->first();
        if($check_department === null) {
            $department_store = new Department();
            $department_store->name = $request->input('name');
            $department_store->entry_by = Auth::user()->user_id;
            $department_store->entry_date = now();
            $ok = $department_store->save();
            if($ok == true) {
                return back()->with('message','department added successfully!!');
            } else {
                return back()->with('message','Something went wrong!!');
            }
        } else {
            return back()->with('message','Data already exist!!');
        }
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
        $department_edit = Department::findOrFail($id);
        return view('admin.department.edit',compact('department_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department_update = Department::findOrFail($id);
        $department_update->name= $request->input('name');
        $department_update->save();
        return redirect()->route('department.index')->with('message','department Updated Successfully!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department_delete = Department::findOrFail($id);
        $department_delete->delete();
        return redirect()->back()->with('message','department Deleted Successfully!!');
    }
}
