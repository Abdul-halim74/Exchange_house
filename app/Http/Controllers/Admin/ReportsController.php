<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function vDate(){
        return view('admin.Reports.visitor.index');
    }

    public function vDateShow(Request $request) {

        $get__report = DB::select("SELECT users.name,v_name,v_email,v_contact, visiting_reason, v_start_time, v_end_time FROM users inner join visitors on users.id=visitors.user_id left join visitor_names on visitors.id=visitor_names.visitor_id WHERE visitors.entry_date BETWEEN '2022-04-10' AND '2022-04-12'");
        //dd($get__report);
        //$get__report = visitor::whereBetween('entry_date',[$request->start_date, $request->end_date])->orderBy('id','desc')->get();
        return view('admin.Reports.visitor.show', [
            'get_report' => $get__report
        ]);
    }
}
