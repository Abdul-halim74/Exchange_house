<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{
    public function index() {
        $branch = Branch::latest()->get();
        return view('admin.branch.index', compact('branch'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'branch_code' => 'required',
            'phone' => 'required|numeric|digits_between:8,15',
            'location' => 'required',
        ],[
            'name.required' => 'Please enter branch name',
            'branch_code.required' => 'Please enter branch code',
            'phone.required' => 'Please enter branch phone number',
            'location.required' => 'Please enter branch address',
        ]);

        $check_branch = Branch::where('name',$request->name)->orWhere('branch_code',$request->branch_code)->first();

        if($check_branch === null) {
            $branch_store = new Branch();
            $branch_store->name = $request->input('name');
            $branch_store->branch_code = $request->input('branch_code');
            $branch_store->phone = $request->input('phone');
            $branch_store->location = $request->input('location');
            $ok = $branch_store->save();
            if($ok == true) {
                return back()->with('message', 'Branch Added Successfully!!');
            } else {
                return back()->with('message','Something went wrong!!');
            }
        } else {
            return back()->with('message','Data already exist!!');
        }

    }
    public function edit($id)
    {
        $branch_edit = Branch::findOrFail($id);
        return view('admin.branch.edit', compact('branch_edit'));
    }

    public function update(Request $request)
    {
        $update_id = $request->input('update_id');
        $branch_update = Branch::findOrfail($update_id);
        $branch_update->name = $request->input('name');
        $branch_update->branch_code = $request->input('branch_code');
        $branch_update->phone = $request->input('phone');
        $branch_update->location = $request->input('location');
        $branch_update->save();
        return redirect()->route('admin.branch_list')->with('message','Branch updated Successfully!!');
    }
}
