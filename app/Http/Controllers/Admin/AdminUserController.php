<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Branch;
use App\Models\LogInfo;
use App\Models\RoleTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    //Admin list without user and admin
    public function userList() {
        $users = User::whereNotIn('role_id', [1, 2])->where('status',1)->latest()->get();
        return view('admin.user.index',compact('users'));
    }

    //Admin registration
    public function userCreate() {
        $roles = RoleTable::whereNotIn('id', [1,2])->get();
        $branches = Branch::latest()->get();
        $departments = Department::latest()->get();
        return view('admin.user.create', [
            'roles' => $roles,
            'branches'=> $branches,
            'departments'=>$departments
        ]);
    }
    public function userStore(Request $request) {
        $users = User::all()->last();
        if($users === null) {
            $oldUserId = 100;
        } else {
            $oldUserId = $users->user_id;
        }
        $user_id = $oldUserId + 1;

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'position' => 'required',
            'contact' => 'required',
            'role_id' => 'required',
        ],[
            'name.required' => 'Please enter name',
            'email.required' => 'Please enter a valid email address',
            'password.required' => 'Please enter password',
            'position.required' => 'Please enter position',
            'contact.required' => 'Please enter contact number',
            'role_id.required' => 'Please select a user role',
        ]);

        $check_user = User::where('email', $request->email)->first();
        if($check_user === null) {
            $user_store = new User();
            $user_store->name = $request->input('name');
            $user_store->email = $request->input('email');
            $user_store->password = Hash::make($request->input('password'));
            $user_store->position = $request->input('position');
            $user_store->contact = $request->input('contact');
            $user_store->branch_id = $request->input('branch_id');
            $user_store->department_id = $request->input('department_id');
            $user_store->role_id = $request->input('role_id');
            $user_store->user_id = $user_id;

            $ok = $user_store->save();
            if($ok == true) {
                return redirect()->route('admin.user_list')->with('message','User has been created successfully!!');
            } else {
                return redirect()->route('admin.user_list')->with('message','Something went wrong!!');
            }
        } else {
            return redirect()->route('admin.user_list')->with('message','Data already exist!!');
        }
    }

    public function inactive($id) {
        User::findOrFail($id)->update(['status' => 0]);
        return redirect()->back()->with('message','User Inactive');
    }

    public function active($id) {
        User::find($id)->update(['status'=>1]);
        return redirect()->back()->with('message','User Active');
    }

    //Update user
    public function userEdit($id) {
        $roles = RoleTable::whereNotIn('id', [1,2])->get();
        $branches = Branch::latest()->get();
        $departments = Department::latest()->get();
        $user = User::findOrFail($id);
        return view('admin.user.edit', [
            'roles' => $roles,
            'branches' => $branches,
            'departments' => $departments,
            'user' => $user
        ]);
    }
    public function userUpdate(Request $request) {
        $update_id = $request->input('update_id');
        $user_update = User::findOrFail($update_id);
        if ($user_update->email == $request->email) {
            return redirect()->route('admin.user_list')->with('message','Data already exist!!');
        } else {
            $user_update = User::findOrFail($update_id);
            $user_update->name = $request->input('name');
            $user_update->email = $request->input('email');
            $user_update->position = $request->input('position');
            $user_update->contact = $request->input('contact');
            $user_update->branch_id = $request->input('branch_id');
            $user_update->department_id = $request->input('department_id');
            $user_update->role_id = $request->input('role_id');
            $ok = $user_update->save();
            if ($ok == true) {
                return redirect()->route('admin.user_list')->with('message','User has been updated successfully!!');
            } else {

                return redirect()->route('admin.user_list')->with('message','Something went wrong!!');
            }
        }
    }

    //Active user
    public function activeUser($id){
        $dataStore = User::findOrFail($id);
        $ok = User::findOrFail($id)->update(['status' => 1, 'auth_date' => now()]);
        if($ok == true) {
            //Store data into log table
            $logData = new LogInfo();
            $logData->model_name = 'User';
            $logData->operation_name = 'User authorize';
            $logData->status = 'Success';
            $logData->reason = 'User is being authorized successfully';
            $logData->previous_data = json_encode($dataStore);
            $logData->entry_by = Auth::user()->user_id;
            $logData->entry_date = now();
            $logData->ip_address = request()->ip();
            $logData->save();
            return redirect()->route('admin.user_list')->with('message','User is being authorized successfully!!');
        } else {
            //Store data into log table
            $logData = new LogInfo();
            $logData->model_name = 'User';
            $logData->operation_name = 'User authorize';
            $logData->status = 'Failed';
            $logData->reason = 'Something went wrong';
            $logData->entry_by = Auth::user()->user_id;
            $logData->entry_date = now();
            $logData->ip_address = request()->ip();
            $logData->save();
            return redirect()->route('admin.user_list')->with('message','Something went wrong!!');
        }
    }

    //Deactivate user
    public function inactiveUser($id){
        $dataStore = User::findOrFail($id);
        $ok = User::findOrFail($id)->update(['status' => 2,'auth_date' => now()]);
        if($ok == true) {
            //Store data into log table
            $logData = new LogInfo();
            $logData->model_name = 'User';
            $logData->operation_name = 'User decline';
            $logData->status = 'Success';
            $logData->reason = 'User is being declined successfully';
            $logData->previous_data = json_encode($dataStore);
            $logData->entry_by = Auth::user()->user_id;
            $logData->entry_date = now();
            $logData->ip_address = request()->ip();
            $logData->save();
            return redirect()->route('admin.user_list')->with('message','User is being declined successfully!!');
        } else {
            //Store data into log table
            $logData = new LogInfo();
            $logData->model_name = 'User';
            $logData->operation_name = 'User decline';
            $logData->status = 'Failed';
            $logData->reason = 'Something went wrong';
            $logData->entry_by = Auth::user()->user_id;
            $logData->entry_date = now();
            $logData->ip_address = request()->ip();
            $logData->save();
            return redirect()->route('admin.user_list')->with('message','Something went wrong!!');
        }
    }
}
