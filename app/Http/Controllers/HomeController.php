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
            $emergency=EmergencyLoan::join('account_details','account_details.id','emergency_loans.details_id')
        ->where('emergency_loans.user_id',Auth::user()->id)->sum('emergency_loans.amount_without_interest');
        $normal=NormalShare::join('account_details','account_details.id','normal_shares.details_id')
        ->where('normal_shares.user_id',Auth::user()->id)->sum('normal_shares.amount_without_interest');
        $table=TableBankingLoan::join('account_details','account_details.id','table_banking_loans.details_id')
        ->where('table_banking_loans.user_id',Auth::user()->id)->sum('table_banking_loans.amount_without_interest');
        $shares=ShareAccount::join('account_details','account_details.id','share_accounts.details_id')
        ->where('share_accounts.user_id',Auth::user()->id)->sum('share_accounts.amount_without_interest');
        $inst_share=InstitutionalShare::join('account_details','account_details.id','institutional_shares.details_id')
        ->where('institutional_shares.user_id',Auth::user()->id)->sum('institutional_shares.amount_without_interest');
        
        return view('member.member-dashboard',compact('emergency','normal','table','shares','inst_share'));
           
        }
        elseif($user==2){
            $members=User::where('role',3)->where('is_approved',1)->count();
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
            $members=User::where('role',3)->where('is_approved',1)->count();
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
        $members=User::where('role',3)->where('is_approved',1)->count();
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
