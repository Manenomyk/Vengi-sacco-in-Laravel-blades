<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use App\Models\Share;
use App\Models\NormalShare;
use App\Models\ShareAccount;
use Illuminate\Http\Request;
use App\Models\EmergencyLoan;
use App\Models\TableBankingLoan;
use App\Models\InstitutionalShare;
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
           
        }
        elseif($user==2){
            $members=User::where('role',3)->count();
            $dis_emergency=EmergencyLoan::where('is_approved',0)->count();
            $dis_normal=NormalShare::where('is_approved',0)->count();
            $dis_table=TableBankingLoan::where('is_approved',0)->count();
            $dis_share=ShareAccount::where('is_approved',0)->count();
            $dis_inst=InstitutionalShare::where('is_approved',0)->count();
            $dis_user=User::where('is_approved',0)->count();
            
    
    
            $emergency=EmergencyLoan::where('is_approved',1)->sum('amount_without_interest');
            $normal=NormalShare::where('is_approved',1)->sum('amount_without_interest');
            $table=TableBankingLoan::where('is_approved',1)->sum('amount_without_interest');
          
          
            $inst_share=InstitutionalShare::where('is_approved',1)->sum('amount_without_interest');
            $share=ShareAccount::where('is_approved',1)->sum('amount_without_interest');
          
    
            return view('authorizer.authorizer-dashboard',compact(
                'members',
                'emergency',
                'normal',
                'table',
                'inst_share',
                'share',
                'dis_emergency',
                'dis_normal',
                'dis_table',
                'dis_share',
                'dis_inst',
                'dis_user'
            ));
        }
        elseif($user==1){
            $members=User::where('role',3)->count();
            $dis_emergency=EmergencyLoan::where('is_approved',0)->count();
            $dis_normal=NormalShare::where('is_approved',0)->count();
            $dis_table=TableBankingLoan::where('is_approved',0)->count();
            $dis_share=ShareAccount::where('is_approved',0)->count();
            $dis_inst=InstitutionalShare::where('is_approved',0)->count();
            $dis_user=User::where('is_approved',0)->count();
    
    
            $emergency=EmergencyLoan::where('is_approved',1)->sum('amount_without_interest');
        $normal=NormalShare::where('is_approved',1)->sum('amount_without_interest');
        $table=TableBankingLoan::where('is_approved',1)->sum('amount_without_interest');
      
    
            $inst_share=InstitutionalShare::where('is_approved',1)->sum('amount_without_interest');
            $share=ShareAccount::where('is_approved',1)->sum('amount_without_interest');
            $shares=$inst_share+$share;
    
            return view('clerk.clerk-dashboard',compact(
                'members',
                'emergency',
                'normal',
                'table',
                'inst_share',
                'share',
                'dis_emergency',
                'dis_normal',
                'dis_table',
                'dis_share',
                'dis_inst',
                'dis_user'
            ));
            
        }
        elseif($user==0){
            $members=User::where('role',3)->count();
        $dis_emergency=EmergencyLoan::where('is_approved',0)->count();
        $dis_normal=NormalShare::where('is_approved',0)->count();
        $dis_table=TableBankingLoan::where('is_approved',0)->count();
        $dis_share=ShareAccount::where('is_approved',0)->count();
        $dis_inst=InstitutionalShare::where('is_approved',0)->count();
        $dis_user=User::where('is_approved',0)->count();
        


        $emergency=EmergencyLoan::where('is_approved',1)->sum('amount_without_interest');
        $normal=NormalShare::where('is_approved',1)->sum('amount_without_interest');
        $table=TableBankingLoan::where('is_approved',1)->sum('amount_without_interest');
      
      
        $inst_share=InstitutionalShare::where('is_approved',1)->sum('amount_without_interest');
        $share=ShareAccount::where('is_approved',1)->sum('amount_without_interest');
      

        return view('admin.admin-dashboard',compact(
            'members',
            'emergency',
            'normal',
            'table',
            'inst_share',
            'share',
            'dis_emergency',
            'dis_normal',
            'dis_table',
            'dis_share',
            'dis_inst',
            'dis_user'
        ));
    
        }
    }
}
