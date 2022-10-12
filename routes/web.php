<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoansController;
use App\Http\Controllers\Admin\AdminLogsController;
use App\Http\Controllers\Admin\AdminMembersController;
use App\Http\Controllers\Admin\AdminSharesController;
use App\Http\Controllers\Authorizer\AuthorizerDashboardController;
use App\Http\Controllers\Authorizer\AuthorizerDisplayController;
use App\Http\Controllers\Authorizer\AuthorizerLoansController;
use App\Http\Controllers\Authorizer\AuthorizerMembersController;
use App\Http\Controllers\Authorizer\AuthorizerSharesController;
use App\Http\Controllers\Clerk\AccountController;
use App\Http\Controllers\Clerk\AccountType;
use App\Http\Controllers\Clerk\ClerkLoansController;
use App\Http\Controllers\Clerk\DashBoardController;
use App\Http\Controllers\Clerk\DisplayController;
use App\Http\Controllers\Clerk\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Clerk\SharesController;
use App\Http\Controllers\Member\MembersDashboardController;
use App\Http\Controllers\Member\MembersMyloansController;
use App\Http\Controllers\Member\MembersMysharesController;
use App\Http\Controllers\PdfController;
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
    return view('welcome');
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
        Route::get('gen-ledger','gen_ledgers');
    });


    Route::controller(DashBoardController::class)->group(function(){
        Route::get('clerk-dash','index');
    });

    Route::controller(ClerkLoansController::class)->group(function(){
        Route::get('clerk-loans','index');
        Route::get('clerk-issue-loans','create');
        Route::post('store-loans','store');
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

    Route::controller(AuthorizerLoansController::class)->group(function(){
        Route::get('authorizer-loans','index');
        Route::get('authorizer-unapproved-loans','unapproved_loans');
        Route::post('authorizer-approve-loans/{id}','approve');
    });

    Route::controller(AuthorizerSharesController::class)->group(function(){
        Route::get('authorizer-shares','index');
        Route::get('authorizer-unapproved-shares','unapproved_shares');
        Route::post('authorizer-approve-shares/{id}','approve');
    });

    //admin
    Route::controller(AdminDashboardController::class)->group(function(){
        Route::get('admin-dashboard','index');
    });    

    Route::controller(AdminMembersController::class)->group(function(){
        Route::any('admin-members','index');
        Route::get('admin-unapproved-members','unapproved_members');
    });

    Route::controller(AdminLoansController::class)->group(function(){
        Route::get('admin-loans','index');
        Route::get('admin-unapproved-loans','unapproved_loans');
    });

    Route::controller(AdminSharesController::class)->group(function(){
        Route::get('admin-shares','index');
        Route::get('admin-unapproved-shares','unapproved_shares');
    });

    Route::get('get-logs',[AdminLogsController::class,'logs']);

     //member
     Route::controller(MembersDashboardController::class)->group(function(){
        Route::get('member-dashboard','index');
    });    

    Route::controller(MembersMyloansController::class)->group(function(){
        Route::get('member-loans','index');
    });

    Route::controller(MembersMysharesController::class)->group(function(){
        Route::get('member-shares','index');
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


});
