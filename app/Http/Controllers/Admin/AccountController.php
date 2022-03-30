<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountOpening;
use App\Models\AccountType;
use App\Models\City;
use App\Models\CountryInfo;
use App\Models\CustomerInfo;
use App\Models\IdentificationType;
use App\Models\LogInfo;
use App\Models\Occupation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index() {
        $accounts = AccountOpening::latest()->get();
        return view('admin.account.index', [
            'accounts' => $accounts
        ]);
    }

    //Create new account
    public function create() {
        return view('admin.account.search');
    }
    //Search for existing customer
    public function searchCustomerForAccount(Request $request) {
        $search = $request['search'];
        if ($search === null) {
            //Store data into log table
            $logData = new LogInfo();
            $logData->model_name = 'CustomerInfo';
            $logData->operation_name = 'Search customer for account';
            $logData->status = 'Failed';
            $logData->reason = 'Empty field found';
            $logData->entry_by = Auth::user()->user_id;
            $logData->entry_date = now();
            $logData->ip_address = $request->ip();
            $logData->save();
            return redirect()->route('admin.account_create')->with('message','Empty field found!!');
        } else {
            $customerCheck = CustomerInfo::where('status', 1)->where(function ($query) use($search) {
                $query->where('id_number', $search)->orWhere('contact_number', $search);
            })->first();
            if ($customerCheck === null) {
                //Store data into log table
                $logData = new LogInfo();
                $logData->model_name = 'CustomerInfo';
                $logData->operation_name = 'Search customer for account';
                $logData->status = 'Failed';
                $logData->reason = 'No data found';
                $logData->entry_by = Auth::user()->user_id;
                $logData->entry_date = now();
                $logData->ip_address = $request->ip();
                $logData->save();
                return redirect()->route('admin.account_create')->with('message','No data found!!');
            } else {
                $accountCheck = AccountOpening::where('customer_id', $customerCheck->id)->first();
                if ($accountCheck == null) {
                    $type_ids = IdentificationType::all();
                    $countries = CountryInfo::all();
                    $cities = City::all();
                    $customer = CustomerInfo::where('id_number', $search)->orWhere('contact_number', $search)->first();
                    $occupations = Occupation::all();
                    $account_types = AccountType::all();
                    return view('admin.account.create', [
                        'search' => $search,
                        'customer' => $customer,
                        'type_ids' => $type_ids,
                        'countries' => $countries,
                        'cities' => $cities,
                        'occupations' => $occupations,
                        'account_types' => $account_types,
                    ]);
                } else {
                    //Store data into log table
                    $logData = new LogInfo();
                    $logData->model_name = 'AccountOpening';
                    $logData->operation_name = 'Search customer for account';
                    $logData->status = 'Failed';
                    $logData->reason = 'Customer already have an account';
                    $logData->entry_by = Auth::user()->user_id;
                    $logData->entry_date = now();
                    $logData->ip_address = $request->ip();
                    $logData->save();
                    return redirect()->route('admin.account_create')->with('message','Customer already have an account!!');
                }

            }
        }
    }

    public function get_rate($id) {
        $rate = AccountType::where('id',$id)->get();
        return json_encode($rate);
    }

    public function store(Request $request) {
        //Check whether the customer have an account or not
        $customer_id = $request->cus_id;
        $accountCheck = AccountOpening::where('customer_id', $customer_id)->first();
        if ($accountCheck === null) {
            //Requirement check and validation the input
            $request->validate([
                'signature_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                'probably_monthly_income' => 'required|numeric',
                'probably_monthly_transaction' => 'required|numeric',
                'account_type_id' => 'required',
//                'nominee_name' => 'regex:/(^[A-Za-z ]+$)+/',
//                'nominee_nid_number' => 'alpha_num',
//                'nominee_contact_no' => 'min:10',
//                'nominee_father_name' => 'regex:/(^[A-Za-z ]+$)+/',
//                'nominee_mother_name' => 'regex:/(^[A-Za-z ]+$)+/',
            ],[
                'signature_image.required' => 'Customer signature is required and it will be an image format',
                'probably_monthly_income.required' => 'Add customer probably monthly income',
                'probably_monthly_transaction.required' => 'Add customer probably monthly transaction',
                'account_type_id.required' => 'Select an account type',
//                'nominee_name.regex' => 'Enter nominee name',
//                'nominee_nid_number.alpha_num' => 'Enter nominee nid number',
//                'relation_with_nominee' => 'Enter customer relation with nominee',
//                'nominee_dob' => 'Select nominee date of birth',
//                'nominee_contact_no.numeric' => 'Enter nominee contact number and must be greater than 10 digit',
//                'nominee_father_name.regex' => 'Enter nominee father name',
//                'nominee_mother_name.regex' => 'Enter nominee mother name',
            ]);

            //Store the account information
            $entry_by = Auth::user()->user_id;
            $account_no = '900000'.'-'.hexdec(uniqid());
            $dob =  $request->nominee_dob;
            $nominee_age = Carbon::parse($dob)->diff(Carbon::now())->y;

            $image = $request->file('signature_image');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
            $directory = 'img/account/'.$account_no.'/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;

            $account = new AccountOpening();
            $account->customer_id = $customer_id;
            $account->branch_id = 1;
            $account->account_type_id= $request->account_type_id;
            $account->interest_rate = $request->interest_rate;
            $account->account_no = $account_no;
            $account->signature_image = $imageUrl;
            $account->probably_monthly_income = $request->probably_monthly_income;
            $account->probably_monthly_transaction = $request->probably_monthly_transaction;
            $account->nominee_name = $request->nominee_name;
            $account->nominee_nid_number = $request->nominee_nid_number;
            $account->nominee_address = $request->nominee_address;
            $account->relation_with_nominee = $request->relation_with_nominee;
            $account->nominee_dob = $request->nominee_dob;
            $account->nominee_age = $nominee_age;
            $account->nominee_father_name = $request->nominee_father_name;
            $account->nominee_mother_name = $request->nominee_mother_name;
            $account->nominee_contact_no = $request->nominee_contact_no;
            $account->entry_by = $entry_by;
            $account->entry_date = now();
            $ok = $account->save();

            if($ok == true) {
                //Store data into log table
                $logData = new LogInfo();
                $logData->model_name = 'AccountOpening';
                $logData->operation_name = 'Account store';
                $logData->status = 'Success';
                $logData->reason = 'Account has been created successfully';
                $logData->previous_data = json_encode($account);
                $logData->entry_by = Auth::user()->user_id;
                $logData->entry_date = now();
                $logData->ip_address = $request->ip();
                $logData->save();
                return redirect()->route('admin.account_authorize')->with('message','Account has been created successfully!!');
            } else {
                //Store data into log table
                $logData = new LogInfo();
                $logData->model_name = 'AccountOpening';
                $logData->operation_name = 'Account store';
                $logData->status = 'Failed';
                $logData->reason = 'Something went wrong';
                $logData->entry_by = Auth::user()->user_id;
                $logData->entry_date = now();
                $logData->ip_address = $request->ip();
                $logData->save();
                return redirect()->route('admin.account_authorize')->with('message','Something went wrong!!');
            }

        } else {
            //Store data into log table
            $logData = new LogInfo();
            $logData->model_name = 'AccountOpening';
            $logData->operation_name = 'Account store';
            $logData->status = 'Failed';
            $logData->reason = 'Customer already have an account';
            $logData->entry_by = Auth::user()->user_id;
            $logData->entry_date = now();
            $logData->ip_address = $request->ip();
            $logData->save();
            return redirect()->route('admin.account_create')->with('message','Data already stored!!');
        }
    }

    //Download customer signature
    public function downloadSignature($id) {
        $download_data = AccountOpening::where('id', $id)->firstOrFail();
        $pathToFile = ($download_data->signature_image);
        return response()->download($pathToFile);
    }

    //Active account
    public function activeAccount($id) {
        $checkAuth = AccountOpening::where('id', $id)->value('entry_by');
        if(Auth::user()->user_id == $checkAuth) {
            //Store data into log table
            $logData = new LogInfo();
            $logData->model_name = 'AccountOpening';
            $logData->operation_name = 'Account authorize';
            $logData->status = 'Failed';
            $logData->reason = 'You do not have the permission';
            $logData->entry_by = Auth::user()->user_id;
            $logData->entry_date = now();
            $logData->ip_address = request()->ip();
            $logData->save();
            return redirect()->route('admin.account_authorize')->with('message','You do not have the permission!!');
        } else {
            $dataStore = AccountOpening::findOrFail($id);
            $ok = AccountOpening::findOrFail($id)->update(['status' => 1, 'auth_by' => Auth::user()->user_id, 'auth_date' => now()]);
            if($ok == true) {
                //Store data into log table
                $logData = new LogInfo();
                $logData->model_name = 'AccountOpening';
                $logData->operation_name = 'Account authorize';
                $logData->status = 'Success';
                $logData->reason = 'Account is being authorized successfully';
                $logData->previous_data = json_encode($dataStore);
                $logData->entry_by = Auth::user()->user_id;
                $logData->entry_date = now();
                $logData->ip_address = request()->ip();
                $logData->save();
                return redirect()->route('admin.account_authorize')->with('message','Account is being authorized successfully!!');
            } else {
                //Store data into log table
                $logData = new LogInfo();
                $logData->model_name = 'AccountOpening';
                $logData->operation_name = 'Account authorize';
                $logData->status = 'Failed';
                $logData->reason = 'Something went wrong';
                $logData->entry_by = Auth::user()->user_id;
                $logData->entry_date = now();
                $logData->ip_address = request()->ip();
                $logData->save();
                return redirect()->route('admin.account_authorize')->with('message','Something went wrong!!');
            }
        }
    }
    //Inactive account
    public function inactiveAccount($id) {
        $checkAuth = AccountOpening::where('id', $id)->value('entry_by');
        if(Auth::user()->user_id == $checkAuth) {
            //Store data into log table
            $logData = new LogInfo();
            $logData->model_name = 'AccountOpening';
            $logData->operation_name = 'Account decline';
            $logData->status = 'Failed';
            $logData->reason = 'You do not have the permission';
            $logData->entry_by = Auth::user()->user_id;
            $logData->entry_date = now();
            $logData->ip_address = request()->ip();
            $logData->save();
            return redirect()->route('admin.account_authorize')->with('message','You do not have the permission!!');
        } else {
            $dataStore = AccountOpening::findOrFail($id);
            $ok = AccountOpening::findOrFail($id)->update(['status' => 2, 'auth_by' => Auth::user()->user_id, 'auth_date' => now()]);
            if($ok == true) {
                //Store data into log table
                $logData = new LogInfo();
                $logData->model_name = 'AccountOpening';
                $logData->operation_name = 'Account decline';
                $logData->status = 'Success';
                $logData->reason = 'Account is being declined successfully';
                $logData->previous_data = json_encode($dataStore);
                $logData->entry_by = Auth::user()->user_id;
                $logData->entry_date = now();
                $logData->ip_address = request()->ip();
                $logData->save();
                return redirect()->route('admin.account_authorize')->with('message','Account is being declined successfully!!');
            } else {
                //Store data into log table
                $logData = new LogInfo();
                $logData->model_name = 'AccountOpening';
                $logData->operation_name = 'Account decline';
                $logData->status = 'Failed';
                $logData->reason = 'Something went wrong';
                $logData->entry_by = Auth::user()->user_id;
                $logData->entry_date = now();
                $logData->ip_address = request()->ip();
                $logData->save();
                return redirect()->route('admin.account_authorize')->with('message','Something went wrong!!');
            }
        }
    }

    //Unauthorized account
    public function unauthorizedData() {
        $accounts = AccountOpening::where('status', 0)->latest()->get();
        return view('admin.account.authorize', [
            'accounts' => $accounts
        ]);
    }

    //Update account
    public function updateAccount() {
        return view('admin.account.edit');
    }
    //Search account to update
    public function searchAccountToUpdate(Request $request) {
        $search = $request['search'];
        if ($search === null) {
            //Store data into log table
            $logData = new LogInfo();
            $logData->model_name = 'AccountOpening';
            $logData->operation_name = 'Account update';
            $logData->status = 'Failed';
            $logData->reason = 'Empty field found';
            $logData->entry_by = Auth::user()->user_id;
            $logData->entry_date = now();
            $logData->ip_address = request()->ip();
            $logData->save();
            return redirect()->route('admin.account_edit')->with('message','Empty field found!!');
        } else {
            $accountCheck = AccountOpening::where('account_no', $search)->where('status', 1)->first();
            if ($accountCheck === null) {
                //Store data into log table
                $logData = new LogInfo();
                $logData->model_name = 'AccountOpening';
                $logData->operation_name = 'Account update';
                $logData->status = 'Failed';
                $logData->reason = 'No data found';
                $logData->entry_by = Auth::user()->user_id;
                $logData->entry_date = now();
                $logData->ip_address = request()->ip();
                $logData->save();
                return redirect()->route('admin.account_edit')->with('message','No data found!!');
            } else {
                $account = AccountOpening::where('account_no', $search)->where('status', 1)->first();
                $type_ids = IdentificationType::all();
                $countries = CountryInfo::all();
                $cities = City::all();
                $occupations = Occupation::all();
                $account_types = AccountType::all();
                return view('admin.account.update', [
                    'search' => $search,
                    'account' => $account,
                    'type_ids' => $type_ids,
                    'countries' => $countries,
                    'cities' => $cities,
                    'occupations' => $occupations,
                    'account_types' => $account_types
                ]);
            }
        }
    }

    public function updateAccountInfo(Request $request) {
        $id = $request->account_id;
        $account_no = $request->account_no ;
        $entry_by = Auth::user()->user_id;
        $account = AccountOpening::findOrFail($id);
        $image = $request->file('signature_image');

        if ($image) {
            //Requirement check and validation the input
            $request->validate([

                'signature_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                'probably_monthly_income' => 'required|numeric',
                'probably_monthly_transaction' => 'required|numeric',
                'account_type_id' => 'required',
//                    'nominee_name' => 'regex:/(^[A-Za-z ]+$)+/',
//                    'nominee_nid_number' => 'alpha_num',
//                    'relation_with_nominee' => 'alpha_num',
//                    'nominee_dob' => 'date',
//                    'nominee_contact_no' => 'numeric',
//                    'nominee_father_name' => 'regex:/(^[A-Za-z ]+$)+/',
//                    'nominee_mother_name' => 'regex:/(^[A-Za-z ]+$)+/',
//                    'nominee_address' => 'alpha_num',
            ],[
                'signature_image.required' => 'Customer signature is required and it will be an image format',
                'probably_monthly_income.required' => 'Add customer probably monthly income',
                'probably_monthly_transaction.required' => 'Add customer probably monthly transaction',
                'account_type_id.required' => 'Select an account type',
//                    'nominee_name.regex' => 'Enter nominee name',
//                    'nominee_nid_number.alpha_num' => 'Enter nominee nid number',
//                    'relation_with_nominee.alpha_num' => 'Enter customer relation with nominee',
//                    'nominee_dob.required' => 'Select nominee date of birth',
//                    'nominee_contact_no.numeric' => 'Enter nominee contact number',
//                    'nominee_father_name.regex' => 'Enter nominee father name',
//                    'nominee_mother_name.regex' => 'Enter nominee mother name',
//                    'nominee_address.alpha_num' => 'Enter nominee nominee address',
            ]);

            $image = $request->file('signature_image');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
            $directory = 'img/account/'.$account_no.'/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;

            $dob = $request->nominee_dob;
            $nominee_age = Carbon::parse($dob)->diff(Carbon::now())->y;

            $account->branch_id = 1;
            $account->account_type_id= $request->account_type_id;
            $account->interest_rate = $request->interest_rate;
            $account->account_no = $account_no;
            $account->signature_image = $imageUrl;
            $account->probably_monthly_income = $request->probably_monthly_income;
            $account->probably_monthly_transaction = $request->probably_monthly_transaction;
            $account->nominee_name = $request->nominee_name;
            $account->nominee_nid_number = $request->nominee_nid_number;
            $account->nominee_address = $request->nominee_address;
            $account->relation_with_nominee = $request->relation_with_nominee;
            $account->nominee_dob = $request->nominee_dob;
            $account->nominee_age = $nominee_age;
            $account->nominee_father_name = $request->nominee_father_name;
            $account->nominee_mother_name = $request->nominee_mother_name;
            $account->nominee_contact_no = $request->nominee_contact_no;
            $account->entry_by = $entry_by;
            $account->status = 0;
            $account->entry_date = now();
            $ok = $account->save();

            if($ok == true) {
                //Store data into log table
                $logData = new LogInfo();
                $logData->model_name = 'AccountOpening';
                $logData->operation_name = 'Account update';
                $logData->status = 'Success';
                $logData->reason = 'Account has been updated successfully';
                $logData->previous_data = json_encode($account);
                $logData->entry_by = Auth::user()->user_id;
                $logData->entry_date = now();
                $logData->ip_address = request()->ip();
                $logData->save();
                return redirect()->route('admin.account_authorize')->with('message','Account has been updated successfully!!');
            } else {
                //Store data into log table
                $logData = new LogInfo();
                $logData->model_name = 'AccountOpening';
                $logData->operation_name = 'Account update';
                $logData->status = 'Failed';
                $logData->reason = 'Something went wrong';
                $logData->entry_by = Auth::user()->user_id;
                $logData->entry_date = now();
                $logData->ip_address = request()->ip();
                $logData->save();
                return redirect()->route('admin.account_authorize')->with('message','Something went wrong!!');
            }
        } else {
            //Requirement check and validation the input
            $request->validate([
                'probably_monthly_income' => 'required|numeric',
                'probably_monthly_transaction' => 'required|numeric',
                'account_type_id' => 'required',
//                    'nominee_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
//                    'nominee_nid_number' => 'required|alpha_num',
//                    'relation_with_nominee' => 'required',
//                    'nominee_dob' => 'required',
//                    'nominee_contact_no' => 'required|numeric',
//                    'nominee_father_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
//                    'nominee_mother_name' => 'required|regex:/(^[A-Za-z ]+$)+/',
//                    'nominee_address' => 'required',
            ],[
                'probably_monthly_income.required' => 'Add customer probably monthly income',
                'probably_monthly_transaction.required' => 'Add customer probably monthly transaction',
                'account_type_id.required' => 'Select an account type',
//                    'nominee_name.required' => 'Enter nominee name',
//                    'nominee_nid_number.required' => 'Enter nominee nid number',
//                    'relation_with_nominee.required' => 'Enter customer relation with nominee',
//                    'nominee_dob.required' => 'Select nominee date of birth',
//                    'nominee_contact_no.required' => 'Enter nominee contact number',
//                    'nominee_father_name.required' => 'Enter nominee father name',
//                    'nominee_mother_name.required' => 'Enter nominee mother name',
//                    'nominee_address.required' => 'Enter nominee nominee address',
            ]);

            $dob = $request->nominee_dob;
            $nominee_age = Carbon::parse($dob)->diff(Carbon::now())->y;

            $account->branch_id = 1;
            $account->account_type_id= $request->account_type_id;
            $account->interest_rate = $request->interest_rate;
            $account->account_no = $account_no;
            $account->probably_monthly_income = $request->probably_monthly_income;
            $account->probably_monthly_transaction = $request->probably_monthly_transaction;
            $account->nominee_name = $request->nominee_name;
            $account->nominee_nid_number = $request->nominee_nid_number;
            $account->nominee_address = $request->nominee_address;
            $account->relation_with_nominee = $request->relation_with_nominee;
            $account->nominee_dob = $request->nominee_dob;
            $account->nominee_age = $nominee_age;
            $account->nominee_father_name = $request->nominee_father_name;
            $account->nominee_mother_name = $request->nominee_mother_name;
            $account->nominee_contact_no = $request->nominee_contact_no;
            $account->status = 0;
            $account->entry_by = $entry_by;
            $account->entry_date = now();
            $ok = $account->save();

            if($ok == true) {
                //Store data into log table
                $logData = new LogInfo();
                $logData->model_name = 'AccountOpening';
                $logData->operation_name = 'Account update';
                $logData->status = 'Success';
                $logData->reason = 'Account has been updated successfully';
                $logData->previous_data = json_encode($account);
                $logData->entry_by = Auth::user()->user_id;
                $logData->entry_date = now();
                $logData->ip_address = request()->ip();
                $logData->save();
                return redirect()->route('admin.account_authorize')->with('message','Account has been updated successfully');
            } else {
                //Store data into log table
                $logData = new LogInfo();
                $logData->model_name = 'AccountOpening';
                $logData->operation_name = 'Account update';
                $logData->status = 'Failed';
                $logData->reason = 'Something went wrong';
                $logData->entry_by = Auth::user()->user_id;
                $logData->entry_date = now();
                $logData->ip_address = request()->ip();
                $logData->save();
                return redirect()->route('admin.account_authorize')->with('message','Something went wrong!!');
            }
        }
    }
}
