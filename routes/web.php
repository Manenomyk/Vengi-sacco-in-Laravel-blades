<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoansController;
use App\Http\Controllers\Admin\AdminMembersController;
use App\Http\Controllers\Admin\AdminSharesController;
use App\Http\Controllers\Authorizer\AuthorizerDashboardController;
use App\Http\Controllers\Authorizer\AuthorizerLoansController;
use App\Http\Controllers\Authorizer\AuthorizerMembersController;
use App\Http\Controllers\Authorizer\AuthorizerSharesController;
use App\Http\Controllers\Clerk\ClerkLoansController;
use App\Http\Controllers\Clerk\ClerkMembersController;
use App\Http\Controllers\Clerk\DashBoardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Clerk\SharesController;
use App\Http\Controllers\Member\MembersDashboardController;
use App\Http\Controllers\Member\MembersMyloansController;
use App\Http\Controllers\Member\MembersMysharesController;
use Illuminate\Support\Facades\Request;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'CheckUser']);

Route::get('/AdminDash', function () {
    return view('admin.admin-dashboard');
})->name('admin.dash');

Route::get('/ClerkDash', function () {
    return view('clerk.clerk-dashboard');
})->name('clerk.dash');

Route::get('/AuthorizerDash', function () {
    return view('authorizer.authorizer-dashboard');
})->name('authorizer.dash');

Route::get('/MemberDash', function () {
    return view('member.member-dashboard');
})->name('member.dash');


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
    Route::controller(SharesController::class)->group(function(){
        Route::get('clerk-shares','index');
        Route::get('clerk-issue-shares','create');
        Route::post('store-shares','store');
    });
    Route::controller(DashBoardController::class)->group(function(){
        Route::get('clerk-dash','index');
    });

    Route::controller(ClerkLoansController::class)->group(function(){
        Route::get('clerk-loans','index');
        Route::get('clerk-issue-loans','create');
        Route::post('store-loans','store');
    });

    Route::controller(ClerkMembersController::class)->group(function(){
        Route::get('clerk-members','index');
        Route::get('clerk-add-members','create');
        Route::post('store-members','store');
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
        Route::get('admin-members','index');
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


});
