<?php

namespace App\Http\Controllers\Clerk;

use App\Http\Controllers\Controller;
use App\Models\EmergencyLoan;
use App\Models\InstitutionalShare;
use App\Models\Loan;
use App\Models\NormalShare;
use App\Models\Share;
use App\Models\ShareAccount;
use App\Models\TableBankingLoan;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
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

        return view('clerk.clerk-dashboard',compact('members','shares','loans','dis_total','emergency','normal','table','inst_share','share'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
