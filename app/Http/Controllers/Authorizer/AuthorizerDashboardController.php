<?php

namespace App\Http\Controllers\Authorizer;

use App\Models\Loan;
use App\Models\User;
use App\Models\Share;
use App\Models\NormalShare;
use App\Models\ShareAccount;
use Illuminate\Http\Request;
use App\Models\EmergencyLoan;
use App\Models\TableBankingLoan;
use App\Models\InstitutionalShare;
use App\Http\Controllers\Controller;

class AuthorizerDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

}
