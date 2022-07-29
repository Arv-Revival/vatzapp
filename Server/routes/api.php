<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//File
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'file',
    ],
    function ($router) {
        Route::post('upload', 'FileController@upload');
        Route::get('download', 'FileController@download');
        Route::get('view', 'FileController@view');
    }
);

//Auth
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'auth',
    ],
    function ($router) {
        Route::post('login', 'AuthController@login');
        Route::post('employeelogin', 'AuthController@employee_login');

        Route::get('getuser', 'AuthController@user_get');
        Route::get('profile', 'AuthController@profile');
        Route::post('changepassword', 'AuthController@change_password');

        Route::post('logout', 'AuthController@logout');
        Route::get('refresh', 'AuthController@refresh');
    }
);

//Admin
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'admin',
    ],
    function ($router) {

        Route::post('register', 'AdminController@register');
        Route::get('list', 'AdminController@list');
        Route::get('expirydatelist', 'AdminController@portal_expiry');
        Route::get('tradelicenseexpirydate', 'AdminController@trade_license_expiry_date');
        Route::post('approveuser', 'AdminController@approve_user');
        Route::put('updatetradelicenseexpiry', 'AdminController@update_trade_license_expiry');
        Route::post('activateuser', 'AdminController@activate_user');
        Route::post('deactivateuser', 'AdminController@deactivate_user');
        Route::post('updateclient', 'AdminController@update_client');
        Route::post('update', 'AdminController@update');
        Route::post('updatebyadmin', 'AdminController@update_by_admin');
        Route::get('dashboardsummary', 'AdminController@dashboard_summary');
        Route::get('clientshortlistbyadmin', 'AdminController@client_short_list_by_admin');
    }
);

//Validator
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'validator',
    ],
    function ($router) {
        Route::post('register', 'ValidatorController@register');
        Route::get('shortlist', 'ValidatorController@short_list');
        Route::get('checkerslist', 'ValidatorController@checker_list_by_validator');
        Route::get('list', 'ValidatorController@list');
        Route::post('updatebyadmin', 'ValidatorController@update_by_admin');
        Route::post('update', 'ValidatorController@update');
        Route::get('dashboardsummary', 'ValidatorController@dashboard_summary');
        Route::get('dashboardrecenttile', 'ValidatorController@dashboard_recent_tile');
        Route::get('clientshortlistbyvalidator', 'ValidatorController@client_short_list_by_validator');
    }
);

//Checker
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'checker',
    ],
    function ($router) {
        Route::post('register', 'CheckerController@register');
        Route::get('shortlist', 'CheckerController@short_list');
        Route::get('clientlist', 'CheckerController@client_list_by_checker');
        Route::get('list', 'CheckerController@list');
        Route::post('updatebyadmin', 'CheckerController@update_by_admin');
        Route::post('update', 'CheckerController@update');
        Route::get('dashboardsummary', 'CheckerController@dashboard_summary');
        Route::get('dashboardrecenttile', 'CheckerController@dashboard_recent_tile');
        Route::get('clientshortlistbychecker', 'CheckerController@client_short_list_by_checker');
    }
);

//Client
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'client',
    ],
    function ($router) {
        Route::post('register', 'ClientController@register');
        Route::get('list', 'ClientController@list');
        Route::get('getclient', 'ClientController@get_client');
        Route::get('vatexpirydate', 'ClientController@vat_expiry_date');
        Route::post('addpaymentlink', 'ClientController@add_payment_link');
        Route::post('deletepaymentlink', 'ClientController@delete_payment_link');
        Route::post('getpaymentlink', 'ClientController@get_payment_link');
        Route::post('updatebyadmin', 'ClientController@update_by_admin');
        Route::post('update', 'ClientController@update');
        Route::get('dashboardsummary', 'ClientController@dashboard_summary');
        Route::get('clientmonthwisegraph', 'ClientController@client_monthwise_graph');
        Route::get('currentvatperiod', 'ClientController@get_current_vat_period_date');
        Route::get('sendemail', [MailController::class, 'index']);
    }
);

//Country
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'country',
    ],
    function ($router) {
        Route::get('get', 'CountryController@get');
        Route::post('create', 'CountryController@store');
        Route::put('update', 'CountryController@update');
        Route::delete('destroy', 'CountryController@destroy');
    }
);

//Region
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'region',
    ],
    function ($router) {
        // Region
        Route::get('get', 'RegionController@get');
        Route::post('create', 'RegionController@store');
        Route::put('update', 'RegionController@update');
        Route::delete('destroy', 'RegionController@destroy');
    }
);

//Plan
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'plan',
    ],
    function ($router) {
        Route::get('get', 'PlanHistoryController@get');
        Route::post('create', 'PlanHistoryController@create');
    }
);

// Supplier
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'supplier',
    ],
    function ($router) {
        Route::get('list', 'SupplierController@list');
        Route::get('topsixsupplierslist', 'SupplierController@get_supplier_list');
        Route::post('create', 'SupplierController@create');
        Route::get('shortlist', 'SupplierController@short_list');
        Route::post('update', 'SupplierController@update');
        Route::get('get', 'SupplierController@get_supplier');
    }
);

//Entry
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'entry',
    ],
    function ($router) {
        Route::post('create', 'EntryController@create');
        Route::get('clientpendinglist', 'EntryController@client_pending_list');
        Route::get('checkerapprovedlist', 'EntryController@checker_approved_list');
        Route::get('checkerpendinglist', 'EntryController@checker_pending_list');
        Route::get('checkerrejectedlist', 'EntryController@checker_rejected_list');
        Route::get('validatorapprovedlist', 'EntryController@validator_approved_list');
        Route::get('validatorpendinglist', 'EntryController@validator_pending_list');
        Route::get('validatorrejectedlist', 'EntryController@validator_rejected_list');
        Route::post('setvalidatorstatus', 'EntryController@set_validator_status');
        Route::post('setcheckerstatus', 'EntryController@set_checker_status');
        Route::get('clientrecentlist', 'EntryController@client_recent_list');
        Route::post('clientdeleteentry', 'EntryController@client_delete_entry');
        Route::post('clientrequestfordelete', 'EntryController@client_request_for_delete');
        Route::post('validatordeleteentry', 'EntryController@validator_delete_entry');
        Route::get('checkinvoicenumberexists', 'EntryController@check_invoice_number_exists');
        Route::get('checkercheckedlist', 'EntryController@checker_checked_list');
        Route::get('checkernoentrylist', 'EntryController@checker_no_entry_list');
        Route::get('validatorcheckedlist', 'EntryController@validator_checked_list');
        Route::get('clientdaywisesummary', 'EntryController@client_daywise_summary');
        Route::get('clientapprovedlist', 'EntryController@client_approved_list');
        Route::get('clientrejectedlist', 'EntryController@client_rejected_list');
        // Admin
        Route::get('admincheckerpendinglist', 'EntryController@admin_checker_pending_list');
        Route::get('admincheckerrejectedlist', 'EntryController@admin_checker_rejected_list');
        Route::get('adminvalidatorpendinglist', 'EntryController@admin_validator_pending_list');
        Route::get('admincheckedlist', 'EntryController@admin_checked_list');
        // Group
        Route::get('invoiceexpgroups', 'EntryController@get_invoice_exp_groups');
        Route::get('invoicepurchasegroups', 'EntryController@get_invoice_purchase_groups');

        //Graph
        Route::get('checkerlastweeksgraph', 'EntryController@checker_last_weeks_graph');
        Route::get('validatorlastweeksgraph', 'EntryController@validator_last_weeks_graph');
        Route::get('clientmonthwisegraph', 'EntryController@client_monthwise_graph');
        Route::get('adminlastweeksgraph', 'EntryController@admin_last_weeks_graph');

        Route::get('checkervatpayablegraph', 'EntryController@checker_vat_payable_graph');
        Route::get('validatorvatpayablegraph', 'EntryController@validator_vat_payable_graph');
        Route::get('adminvatpayablegraph', 'EntryController@admin_vat_payable_graph');
    }
);


//Sale entry
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'sale',
    ],
    function ($router) {
        Route::post('create', 'SaleController@create');
        Route::get('get', 'SaleController@get');
        Route::get('clientsalesreport', 'SaleController@client_sales_report');
    }
);

//Expenditure entry
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'expenditure',
    ],
    function ($router) {
        Route::post('create', 'ExpenditureController@create');
        Route::get('get', 'ExpenditureController@get');
        Route::get('clientexpenditurereport', 'ExpenditureController@client_expenditure_report');
    }
);

//Purchase entry
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'purchase',
    ],
    function ($router) {
        Route::post('create', 'PurchaseController@create');
        Route::get('get', 'PurchaseController@get');
        Route::get('clientpurchasesreport', 'PurchaseController@client_purchases_report');
    }
);


// VAT report
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'vatreport',
    ],
    function ($router) {
        Route::post('vatreportperiodsforclient', 'VatReportController@get_vat_report_periods_for_client');
        Route::get('vatreportperiodsforothers', 'VatReportController@get_vat_report_periods_for_others');

        Route::put('updatevatreportvalidator', 'VatReportController@update_vat_report_validator');
        Route::post('vatreportforvalidator', 'VatReportController@get_vat_report_validator');
        Route::post('vatreportforvalidatorbyid', 'VatReportController@get_vat_report_validator_by_id');
        Route::post('vatreportforclient', 'VatReportController@get_vat_report_for_client');
        Route::post('vatreportforothers', 'VatReportController@get_vat_report_for_others');
        Route::post('createvatreport','VatReportController@create_vat_report');
        Route::post('updatevatreport', 'VatReportController@update_vat_report');
    }
);

// Message
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'message',
    ],
    function ($router) {
        Route::post('send', 'MessageController@send');
        Route::post('contacts', 'MessageController@get_contacts');
        Route::post('get', 'MessageController@get_messages');
        Route::get('getallmessages', 'MessageController@get_all_messages');
    }
);
