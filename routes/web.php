<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDisplayController;
use App\Http\Controllers\Admin\AdminLogsController;
use App\Http\Controllers\Admin\AdminMembersController;
use App\Http\Controllers\Authorizer\ApproveController;
use App\Http\Controllers\Authorizer\AuthorizerDashboardController;
use App\Http\Controllers\Authorizer\AuthorizerDisplayController;
use App\Http\Controllers\Authorizer\AuthorizerMembersController;
use App\Http\Controllers\Clerk\AccountController;
use App\Http\Controllers\Clerk\AccountType;
use App\Http\Controllers\Clerk\DashBoardController;
use App\Http\Controllers\Clerk\DisplayController;
use App\Http\Controllers\Clerk\LegderController;
use App\Http\Controllers\Clerk\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Member\MemberDisplayController;
use App\Http\Controllers\Member\MembersDashboardController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Request;
use Laravel\Jetstream\Rules\Role;

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

Route::get('/', function () {
   return redirect()->route('login');
});

Route::get('homepage',[HomeController::class,'CheckUser']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth'])->group(function () {


    //clerk
    //Account type controller
    Route::controller(AccountType::class)->group(function(){
        Route::get('get-account-types','index');
        Route::get('add-account-type','create');
        Route::post('store-account-type','store');
    });

    Route::controller(MemberController::class)->group(function(){
        Route::get('members','index');
        Route::get('add-member','create');
        Route::post('store-user','store');
    });

    Route::controller(AccountController::class)->group(function(){
        Route::get('create-account/{id}','create');
        Route::post('store-opened-account','store');
        Route::get('account-number','get_number_page')->name('cashing');
        Route::post('search-number','search_number');
        Route::post('store-allocation','store_allocation');
    });

    Route::controller(DisplayController::class)->group(function(){
        Route::get('get-emergency','get_emergency');
        Route::get('table-banking','table_banking_loans');
        Route::get('share-account','share_accounts');
        Route::get('normal-share','normal_shares');
        Route::get('inst-shares','institutional_shares');

    });

    Route::controller(LegderController::class)->group(function(){
        Route::get('create-ledger','create');
        Route::get('gen-ledger','gen_ledgers');
        Route::post('reg-ledger','store');
        Route::get('fund-ledger/{id}','edit');
        Route::post('fund/{id}','update');
    });


    Route::controller(DashBoardController::class)->group(function(){
        Route::get('clerk-dash','index');
    });




    //Authorizer
    Route::controller(AuthorizerDashboardController::class)->group(function(){
        Route::get('authorizer-dashboard','index');
    });    

    Route::controller(AuthorizerMembersController::class)->group(function(){
        Route::get('authorizer-members','index');
        Route::get('authorizer-unapproved-members','unapproved_members');
        Route::post('authorizer-approve-member/{id}','approve');
    });

    Route::controller(AuthorizerDisplayController::class)->group(function(){
        Route::get('auth-emergency','emergency');
        Route::get('auth-table-banking','table');
        Route::get('auth-share-account','share');
        Route::get('auth-normal-share','normal');
        Route::get('auth-inst-shares','institutional');
        Route::get('auth-gen-ledger','ledgers');
    });

    Route::controller(ApproveController::class)->group(function(){
        Route::post('auth-approve-share/{id}','share');
        Route::post('auth-approve-table/{id}','table');
        Route::post('auth-approve-inst/{id}','inst');
        Route::post('auth-approve-norm/{id}','normal');
        Route::post('auth-approve-ledger/{id}','ledger');
        Route::post('auth-approve-emergency/{id}','emergency');
    });


    //admin
    Route::controller(AdminDashboardController::class)->group(function(){
        Route::get('admin-dashboard','index');
    });    

    Route::controller(AdminMembersController::class)->group(function(){
        Route::any('admin-members','index');
        Route::get('admin-unapproved-members','unapproved_members');
    });

    Route::controller(AdminDisplayController::class)->group(function(){
        Route::get('admin-emergency','admin_emergency');
        Route::get('admin-table-banking','admin_table');
        Route::get('admin-share-account','admin_share');
        Route::get('admin-normal-share','admin_normal');
        Route::get('admin-inst-shares','admin_inst');

    });

    Route::get('get-logs',[AdminLogsController::class,'logs']);

     //member
     Route::controller(MembersDashboardController::class)->group(function(){
        Route::get('member-dashboard','index');
    });    

    Route::controller(MemberDisplayController::class)->group(function(){
        Route::get('member-emergency','emergency');
        Route::get('member-table-banking','table');
        Route::get('member-share-account','share');
        Route::get('member-normal-share','normal');
        Route::get('member-inst-shares','inst');
    });

    //pdf controller
    Route::controller(PdfController::class)->group(function(){
        Route::post('view-shares-pdf','view_pdf_shares');
        Route::post('download-shares-pdf','download_pdf_shares');
        Route::post('view-members-pdf','view_pdf_members');
        Route::post('download-members-pdf','download_pdf_members');
        Route::post('view-loans-pdf','view_pdf_loans');
        Route::post('download-loans-pdf','download_pdf_loans');
    });

    Route::controller(ReportController::class)->group(function(){
        Route::get('sample-report','emergency');
    });


});
