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
        // select date_format(order_date,'%H %p') as hour,
        // sum(amount) as total_sales
        // from sales
        // group by date_format(order_date,'%H %p');
        $dis_emergency=EmergencyLoan::where('is_approved',0)->count();
        $dis_normal=NormalShare::where('is_approved',0)->count();
        $dis_table=TableBankingLoan::where('is_approved',0)->count();
        $dis_share=ShareAccount::where('is_approved',0)->count();
        $dis_inst=InstitutionalShare::where('is_approved',0)->count();
        $dis_user=User::where('is_approved',0)->count();
        $dis_total=$dis_table+$dis_emergency+$dis_table+$dis_share+$dis_inst+$dis_user;


        $emergency=EmergencyLoan::sum('amount_without_interest');
        $normal=NormalShare::sum('amount_without_interest');
        $table=TableBankingLoan::sum('amount_without_interest');
        $loans=$emergency+$normal+$table;

        $inst_share=InstitutionalShare::where('is_approved',1)->sum('amount_without_interest');
        $share=ShareAccount::where('is_approved',1)->sum('amount_without_interest');
        $shares=$inst_share+$share;

        return view('authorizer.authorizer-dashboard',compact('members','shares','loans','dis_total','emergency','normal','table','inst_share','share'));

    }

}
