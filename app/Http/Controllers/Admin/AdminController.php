<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        $totalUser = User::whereNotIn('role_id', [1, 2])->where('status',1)->count();
        $totalDept = Department::count();

        $visitors = DB::select("SELECT users.name,v_name,v_email,v_contact, visiting_reason, v_start_time, v_end_time, visitors.entry_date as visitingDay, visitors.id as v_id, voucher_print FROM users inner join visitors on users.id=visitors.user_id left join visitor_names on visitors.id=visitor_names.visitor_id ORDER BY visitors.entry_date DESC LIMIT 10");
        return view('admin.home', [
            'totalUser' => $totalUser,
            'totalDept' => $totalDept,
            'visitors' => $visitors
        ]);
    }
}
