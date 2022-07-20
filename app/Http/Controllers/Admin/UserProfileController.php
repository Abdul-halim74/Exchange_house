<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function userProfile()
    {
        return view('admin.userprofile.userProfile');
    }

    public function userProfileUpdate(Request $request)
    {
        $userProfile = Auth::user()->id;
        $user_Update = User::findOrFail($userProfile);
        $user_Update->name = $request->input('name');
        $user_Update->contact = $request->input('contact');
        $user_Update->save();
        return back()->with('message', 'User Profile Updated Succcessfully!!');
    }
    public function UserPassword(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|different:old_password',
            'password_confirmation' => 'required'
        ], [
            'old_password.required' => 'Please enter your current password',
            'new_password.required' => 'Please enter your new password and new password must be different form current password',
            'password_confirmation.required' => 'New password and confirm password does not matched',
        ]);

        $db_pass = Auth::user()->password;


        $current_password = $request->old_password;
        $newPass = $request->new_password;
        $confirmPass = $request->password_confirmation;
        if (Hash::check($current_password, $db_pass)) {
            if ($newPass === $confirmPass) {
                $ok = User::findOrFail(Auth::id())->update([
                    'password' => Hash::make($newPass)
                ]);
                if ($ok == true) {
                    return redirect()->route('userProfile')->with('message', 'Data has been updated successfully!!');
                } else {
                    return redirect()->route('userProfile')->with('message', 'Something went wrong. Please try letter!!');
                }
            } else {
                return redirect()->route('userProfile')->with('message', 'New and confirm password not matched!!');
            }
        } else {
            return redirect()->route('userProfile')->with('message', 'Old password not matched!!');
        }
    }
}
