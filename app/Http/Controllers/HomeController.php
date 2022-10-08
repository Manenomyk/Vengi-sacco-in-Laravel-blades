<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use App\Models\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function CheckUser(){
        if (!Auth::user()) {
            return redirect()->route('login');
        }

      
        $user=Auth::user()->role;

        if($user==3){
            return view('member.member-dashboard');
            // return redirect()->route('member.dash');
        }
        elseif($user==2){
            return view('authorizer.authorizer-dashboard');
            // return redirect()->route('authorizer.dash');
        }
        elseif($user==1){
            return view('clerk.clerk-dashboard');
            // return redirect()->route('clerk.dash');
        }
        else{
            return view('admin.admin-dashboard');
            // return redirect()->route('admin.dash');
        }
    }
}
