<?php

use Laravel\Jetstream\Rules\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Clerk\AccountType;
use App\Http\Controllers\Clerk\LegderController;
use App\Http\Controllers\Clerk\MemberController;
use App\Http\Controllers\Clerk\AccountController;
use App\Http\Controllers\Clerk\DisplayController;
use App\Http\Controllers\Admin\AdminLogsController;
use App\Http\Controllers\Clerk\DashBoardController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Clerk\ClerkReportController;
use App\Http\Controllers\Clerk\ClerkSearchController;
use App\Http\Controllers\Admin\AdminDisplayController;
use App\Http\Controllers\Admin\AdminMembersController;
use App\Http\Controllers\Authorizer\ApproveController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Member\MemberDisplayController;
use App\Http\Controllers\Member\MembersDashboardController;
use App\Http\Controllers\Authorizer\AuthorizerDisplayController;
use App\Http\Controllers\Authorizer\AuthorizerMembersController;
use App\Http\Controllers\Authorizer\AuthorizerDashboardController;



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
    Route::controller(AccountType::class)->group(function(){
        Route::get('get-account-types','index')->middleware('can:clerk');
        Route::get('clerk/account-type/edit','edit')->middleware('can:clerk');
        Route::post('clerk/account-type/update/','update')->middleware('can:clerk');
    });

    Route::controller(MemberController::class)->group(function(){
        Route::get('members','index')->middleware('can:clerk');
        Route::get('add-member','create')->middleware('can:clerk');
        Route::post('store-user','store')->middleware('can:clerk');
    });

    Route::controller(AccountController::class)->group(function(){
        Route::get('create-account/{id}','create')->middleware('can:clerk');
        Route::post('store-opened-account','store')->middleware('can:clerk');
        Route::get('account-number','get_number_page')->name('cashing');
        Route::post('search-number','search_number')->middleware('can:clerk');
        Route::post('store-allocation','store_allocation')->middleware('can:clerk');
    });

    Route::controller(DisplayController::class)->group(function(){
        Route::get('get-emergency','get_emergency')->middleware('can:clerk');
        Route::get('table-banking','table_banking_loans')->middleware('can:clerk');
        Route::get('share-account','share_accounts')->middleware('can:clerk');
        Route::get('normal-share','normal_shares')->middleware('can:clerk');
        Route::get('inst-shares','institutional_shares')->middleware('can:clerk');

    });

    Route::controller(LegderController::class)->group(function(){
        Route::get('create-ledger','create')->middleware('can:clerk');
        Route::get('gen-ledger','gen_ledgers')->middleware('can:clerk');
        Route::post('reg-ledger','store')->middleware('can:clerk');
        Route::get('fund-ledger/{id}','edit')->middleware('can:clerk');
        Route::post('fund/{id}','update')->middleware('can:clerk');
    });


    Route::controller(DashBoardController::class)->group(function(){
        Route::get('clerk-dash','index')->middleware('can:clerk');
    });


    Route::controller(ClerkReportController::class)->group(function(){
        Route::get('clerk/reports','index')->middleware('can:clerk');
        Route::get('clerk/reports/page','get_page')->middleware('can:clerk');
        Route::post('clerk/reports/page/generate','generate_reports')->middleware('can:clerk');
    });

    Route::controller(ClerkSearchController::class)->group(function(){
        Route::post('clerk/search/members','members')->middleware('can:clerk');
    });




    //Authorizer
    Route::controller(AuthorizerDashboardController::class)->group(function(){
        Route::get('authorizer-dashboard','index')->middleware('can:authorizer');
    });    

    Route::controller(AuthorizerMembersController::class)->group(function(){
        Route::get('authorizer-members','index')->middleware('can:authorizer');
        Route::get('authorizer-unapproved-members','unapproved_members')->middleware('can:authorizer');
        Route::post('authorizer-approve-member/{id}','approve')->middleware('can:authorizer');
    });

    Route::controller(AuthorizerDisplayController::class)->group(function(){
        Route::get('auth-emergency','emergency')->middleware('can:authorizer');
        Route::get('auth-table-banking','table')->middleware('can:authorizer');
        Route::get('auth-share-account','share')->middleware('can:authorizer');
        Route::get('auth-normal-share','normal')->middleware('can:authorizer');
        Route::get('auth-inst-shares','institutional')->middleware('can:authorizer');
        Route::get('auth-gen-ledger','ledgers')->middleware('can:authorizer');
    });

    Route::controller(ApproveController::class)->group(function(){
        Route::post('auth-approve-share/{id}','share')->middleware('can:authorizer');
        Route::post('auth-approve-table/{id}','table')->middleware('can:authorizer');
        Route::post('auth-approve-inst/{id}','inst')->middleware('can:authorizer');
        Route::post('auth-approve-norm/{id}','normal')->middleware('can:authorizer');
        Route::post('auth-approve-ledger/{id}','ledger')->middleware('can:authorizer');
        Route::post('auth-approve-emergency/{id}','emergency')->middleware('can:authorizer');
    });


    //admin
    Route::controller(AdminDashboardController::class)->group(function(){
        Route::get('admin-dashboard','index')->middleware('can:admin');
    });    

    Route::controller(AdminMembersController::class)->group(function(){
        Route::any('admin-members','index')->middleware('can:admin');
        Route::get('admin-unapproved-members','unapproved_members')->middleware('can:admin');
    });

    Route::controller(AdminDisplayController::class)->group(function(){
        Route::get('admin-emergency','admin_emergency')->middleware('can:admin');
        Route::get('admin-table-banking','admin_table')->middleware('can:admin');
        Route::get('admin-share-account','admin_share')->middleware('can:admin');
        Route::get('admin-normal-share','admin_normal')->middleware('can:admin');
        Route::get('admin-inst-shares','admin_inst')->middleware('can:admin');

    });

    Route::get('get-logs',[AdminLogsController::class,'logs'])->middleware('can:admin');

    Route::controller(AdminReportController::class)->group(function(){
        Route::get('admin/reports/trial','index')->middleware('can:admin');
        Route::get('admin/reports/page','get_page')->middleware('can:admin');
        Route::post('admin/reports/page/generate','generate_reports')->middleware('can:admin');
    });

     //member
     Route::controller(MembersDashboardController::class)->group(function(){
        Route::get('member-dashboard','index')->middleware('can:member');
    });    

    Route::controller(MemberDisplayController::class)->group(function(){
        Route::get('member-emergency','emergency')->middleware('can:member');
        Route::get('member-table-banking','table')->middleware('can:member');
        Route::get('member-share-account','share')->middleware('can:member');
        Route::get('member-normal-share','normal')->middleware('can:member');
        Route::get('member-inst-shares','inst')->middleware('can:member');
    });

    //pdf controller
    Route::controller(PdfController::class)->group(function(){
        Route::post('view-account-type','pdf_account_types');
        Route::post('view-emergency-pdf','emergency');
        Route::post('view-table-pdf','table');
        Route::post('view-shares-pdf','shares');
        Route::post('view-normal-pdf','normal');
        Route::post('view-inst-pdf','inst');
        Route::post('view-members-pdf','member');
        Route::post('view-trial-pdf','trial');
        Route::post('view-generated-pdf','generated');
    });

    Route::controller(ReportController::class)->group(function(){
        Route::get('sample-report','emergency');
    });


});
