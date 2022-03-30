<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('auth.login');
})->name('site_login');

//Admin routes
Route::group(['prefix'=>'admin','middleware' =>['admin','auth', 'permission']], function(){
    //Dashboard section
    Route::get('/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');

    //Customer section
    Route::get('/customer-list',[CustomerController::class, 'index'])->name('admin.customer_list');
    Route::get('/customer-registration',[CustomerController::class, 'addCustomer'])->name('admin.customer_add');
    Route::get('/get-city/{id}',[CustomerController::class,'getCity']);
    Route::post('/store-customer', [CustomerController::class, 'store'])->name('admin.customer_store');
    Route::get('/download-document/{id}', [CustomerController::class, 'downloadDoc'])->name('admin.download_doc');
    Route::get('/customer-authorize', [CustomerController::class, 'authCustomer'])->name('admin.customer_auth');
    Route::get('/customer-active/{id}',[CustomerController::class,'activeCustomer']);
    Route::get('/customer-inactive/{id}',[CustomerController::class,'inactiveCustomer']);
    Route::get('/customer-edit', [CustomerController::class, 'edit'])->name('admin.customer_edit');
    Route::post('/customer-search', [CustomerController::class, 'searchCustomer'])->name('admin.customer_search');
    Route::post('/customer-update', [CustomerController::class, 'update'])->name('admin.customer_update');
    Route::get('/customer-delete/{id}',[CustomerController::class,'deleteCustomer']);

    //Currency section
    Route::get('/currency',[AdminController::class, 'currency_list'])->name('admin.currency');
    Route::post('/currency-store',[AdminController::class, 'currency_store'])->name('admin.currency_store');
    Route::get('/currency-edit/{id}',[AdminController::class, 'currency_edit'])->name('admin.currency_edit');
    Route::post('/currency-update',[AdminController::class, 'currency_update'])->name('admin.currency_update');

    //Account section
    Route::get('/account-list', [AccountController::class, 'index'])->name('admin.account_list');
    Route::get('/account-create', [AccountController::class, 'create'])->name('admin.account_create');
    Route::get('/customer-search-for-account', [AccountController::class, 'searchCustomerForAccount'])->name('admin.customer_search_for_account');
    Route::get('/get-rate/{id}',[AccountController::class,'get_rate']);
    Route::post('/store-account', [AccountController::class, 'store'])->name('admin.account_store');
    Route::get('/download-signature/{id}', [AccountController::class, 'downloadSignature'])->name('admin.download_signature');
    Route::get('/account-active/{id}',[AccountController::class,'activeAccount']);
    Route::get('/account-inactive/{id}',[AccountController::class,'inactiveAccount'])->name('admin.account_decline');
    Route::get('/account-authorize', [AccountController::class, 'unauthorizedData'])->name('admin.account_authorize');
    Route::get('/account-edit',[AccountController::class, 'updateAccount'])->name('admin.account_edit');
    Route::post('/account-search', [AccountController::class, 'searchAccountToUpdate'])->name('admin.search_account');
    Route::post('/account-update', [AccountController::class, 'updateAccountInfo'])->name('admin.account_update');

    //Currency rate section
    Route::get('/currency-rate-list',[AdminController::class, 'currency_rate'])->name('admin.currency_rate');
    Route::get('/currency-rate-create',[AdminController::class, 'currency_rate_create'])->name('admin.currency_rate_create');
    Route::post('/currency-rate-store',[AdminController::class, 'currency_rate_store'])->name('admin.currency_rate_store');
    Route::post('/get-bank-from-country-id',[AdminController::class, 'get_bank_from_country_id'])->name('admin.get_bank_from_country_id');
    Route::post('/get-currency-from-country-id',[AdminController::class, 'get_currency_from_country_id'])->name('admin.get_currency_from_country_id');
    Route::get('/currency-rate-authorize/{id}',[AdminController::class, 'currency_rate_authorize'])->name('admin.currency_rate_authorize');
    Route::get('/currency-rate-decline/{id}',[AdminController::class, 'currency_rate_decline'])->name('admin.currency_rate_decline');
    Route::get('/currency-rate-edit/{id}',[AdminController::class, 'currency_rate_edit'])->name('admin.currency_rate_edit');
    Route::post('/currency-rate-update',[AdminController::class, 'currency_rate_update'])->name('admin.update_currency_rate');

    //Transaction Charge or commission
    Route::get('/transaction-charge-list',[TransactionController::class, 'transaction_charge_list'])->name('admin.transaction_charge_list');
    Route::get('/transaction-charge-create',[TransactionController::class, 'transaction_charge'])->name('admin.transaction_charge_create');
    Route::post('/transaction-charge-store',[TransactionController::class, 'transaction_charge_store'])->name('admin.transaction_charge_store');
    Route::get('/transaction-charge-authorize/{id}',[TransactionController::class, 'transaction_charge_authorize'])->name('admin.transaction_charge_authorize');
    Route::get('/transaction-charge-decline/{id}',[TransactionController::class, 'transaction_charge_decline'])->name('admin.transaction_charge_decline');
    Route::get('/transaction-charge-edit/{id}',[TransactionController::class, 'transaction_charge_edit'])->name('admin.transaction_charge_edit');
    Route::post('/update_transaction_charge',[TransactionController::class, 'update_transaction_charge'])->name('admin.update_transaction_charge');

    //Agent setup section
    Route::get('/agent-info',[AdminController::class, 'agent_info'])->name('admin.agent_info');
    Route::post('/agent-info-store',[AdminController::class, 'agent_info_store'])->name('admin.store_agent_info');
    Route::get('/agent-info-list',[AdminController::class, 'agent_info_list'])->name('admin.agent_info_list');
    Route::get('/agent-info-authorize/{id}',[AdminController::class, 'agent_info_authorize'])->name('admin.agent_info_authorize');
    Route::get('/agent-info-decline/{id}',[AdminController::class, 'agent_info_decline'])->name('admin.agent_info_decline');
    Route::get('/agent-info-edit/{id}',[AdminController::class, 'agent_info_edit'])->name('admin.agent_info_edit');
    Route::post('/update_agent_info',[AdminController::class, 'update_agent_info'])->name('admin.update_agent_info');

    //Transaction section
    Route::get('/transaction-search', [TransactionController::class, 'transactCreateSearch'])->name('admin.transaction_crate_search');
    Route::get('/transaction-search-result', [TransactionController::class, 'transactCreateSearchData'])->name('admin.transaction_crate_search_data');
    Route::post('/transaction-store', [TransactionController::class, 'storeTransaction'])->name('admin.transaction_store');
    //Route::get('/transaction-list',[TransactionController::class, 'transactionList'])->name('admin.transaction.list');
    Route::get('/transaction-to-authorized-list',[TransactionController::class, 'transactionAuthList'])->name('admin.transaction_auth');
    Route::get('/transaction-authorized/{id}', [TransactionController::class, 'authTransaction'])->name('admin.auth_trn');
    Route::get('/transaction-declined/{id}', [TransactionController::class, 'declineTransaction'])->name('admin.declined_trn');

    Route::post('/transaction-get-sub-country',[TransactionController::class, 'getSubCountryTrn'])->name('admin.get_sub_country_trn');
    Route::post('/transaction-get-city',[TransactionController::class, 'geCityTrn'])->name('admin.get_city_trn');
    Route::post('/transaction-get-receiver-bank-from-country',[TransactionController::class, 'getReceiverBankFromCountry'])->name('admin.get_receiver_bank_from_country_trn');
    Route::post('/transaction-get-receiver-bank-branch-from-country',[TransactionController::class, 'getReceiverBankBranchFromCountry'])->name('admin.get_receiver_bank_branch_from_country_trn');
    Route::post('/transaction-get-agent-bank-name-from-country',[TransactionController::class, 'getAgentBankNameFromCountry'])->name('admin.get_agent_bank_name_from_country_trn');

    //For calculation
    Route::post('/rate-calculation', [TransactionController::class, 'calculationRate'])->name('admin.rate-calculation');
    Route::post('/total-cost', [TransactionController::class, 'totalCost'])->name('admin.total_cost');

    //To print voucher
    Route::get('/transaction-voucher-print/{id}', [TransactionController::class, 'voucherPrint']);
    Route::get('/test-transaction-voucher-print', [TransactionController::class, 'testvoucherPrint']);

    //Track transaction
    Route::get('/track-transaction', [TransactionController::class, 'trackTransaction'])->name('admin.trackTransaction');
    Route::post('/track-transaction-search', [TransactionController::class, 'trackTransactionSearch'])->name('admin.track_transaction_search');

    //Report section
    //Transaction
    Route::get('/transaction-report', [ReportController::class, 'transaction_report'])->name('admin.transaction_report');
    Route::get('/transaction-report-show', [ReportController::class, 'transaction_report_show'])->name('admin.transaction_report_show');
    //Account
    Route::get('/account-report', [ReportController::class, 'account_report'])->name('admin.account_report');
    Route::get('/account-report-show', [ReportController::class, 'account_report_show'])->name('admin.account_report_show');

    //Role and permission section
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);

    //User register section
    Route::get('/user-list',[AdminUserController::class, 'userList'])->name('admin.user_list');
    Route::get('/user-create',[AdminUserController::class, 'userCreate'])->name('admin.user_create');
    Route::post('/user-store',[AdminUserController::class, 'userStore'])->name('admin.user_store');
//    Route::get('/user-active/{id}',[AdminUserController::class,'activeUser'])->name('admin.user_active');
//    Route::get('/user-inactive/{id}',[AdminUserController::class,'inactiveUser'])->name('admin.user_inactive');
    Route::get('/user-edit/{id}',[AdminUserController::class, 'userEdit'])->name('admin.user_edit');
    Route::post('/user-update',[AdminUserController::class, 'userUpdate'])->name('admin.user_update');
});

//User routes
Route::group(['prefix'=>'user','middleware' =>['user','auth']], function(){
    Route::get('dashboard',[UserController::class, 'index'])->name('user.dashboard');
});
