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

        $members=User::where('role',3)->count();
        $share=Share::where('is_approved','approve')->sum('shares_amount');
        $loans=Loan::where('is_approved',1)->sum('loan_amount');
        $pending_loans=Loan::where('is_approved',0)->count();
        $pending_shares=Share::where('is_approved','pending')->count();
        $total_pending=$pending_loans+$pending_shares;
       
        $user=Auth::user()->role;

        if($user==3){
            return view('member.member-dashboard');
            // return redirect()->route('member.dash');
        }
        elseif($user==2){
            return view('authorizer.authorizer-dashboard',compact('members','share','loans','total_pending'));
            // return redirect()->route('authorizer.dash');
        }
        elseif($user==1){
            return view('clerk.clerk-dashboard',compact('members','share','loans','total_pending'));
            // return redirect()->route('clerk.dash');
        }
        else{
            return view('admin.admin-dashboard',compact('members','share','loans','total_pending'));
            // return redirect()->route('admin.dash');
        }
    }
}
