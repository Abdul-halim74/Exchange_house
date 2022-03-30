<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountOpening;
use App\Models\LogInfo;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    //Transaction
    public function transaction_report() {
        return view('admin.report.transaction_report.index');
    }
    public function transaction_report_show(Request $request) {
        $get_transaction_report = Transaction::whereBetween('trn_date',[$request->start_date, $request->end_date])->orWhere('stLevel', $request->status)->orderBy('id','desc')->get();
        //Store data into log table
        $logData = new LogInfo();
        $logData->model_name = 'Transaction';
        $logData->operation_name = 'Transaction report';
        $logData->status = 'Success';
        $logData->reason = 'Generate transaction report';
        $logData->entry_by = Auth::user()->user_id;
        $logData->entry_date = now();
        $logData->ip_address = request()->ip();
        $logData->save();
        return view('admin.report.transaction_report.show', [
            'get_transaction_report' => $get_transaction_report
        ]);
    }

    //Account
    public function account_report() {
        return view('admin.report.account_report.index');
    }
    public function account_report_show(Request $request) {
        $get_account_report =  AccountOpening::whereBetween('entry_date',[$request->start_date, $request->end_date])->orWhere('status', $request->status)->orderBy('id','desc')->get();
        //Store data into log table
        $logData = new LogInfo();
        $logData->model_name = 'AccountOpening';
        $logData->operation_name = 'Account opening report';
        $logData->status = 'Success';
        $logData->reason = 'Generate account opening report';
        $logData->entry_by = Auth::user()->user_id;
        $logData->entry_date = now();
        $logData->ip_address = request()->ip();
        $logData->save();
        return view('admin.report.account_report.show', [
            'get_account_report' => $get_account_report
        ]);

    }
}
