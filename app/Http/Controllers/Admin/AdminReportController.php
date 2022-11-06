<?php

namespace App\Http\Controllers\Admin;

use App\Models\Record;
use App\Models\NormalShare;
use App\Models\ShareAccount;
use Illuminate\Http\Request;
use App\Models\EmergencyLoan;
use App\Models\GeneralLedger;
use App\Models\TableBankingLoan;
use App\Models\InstitutionalShare;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminReportController extends Controller
{
    public function index(){
        $emergency=EmergencyLoan::where('is_approved',1)->sum('amount_without_interest');
        $normal=NormalShare::where('is_approved',1)->sum('amount_without_interest');
        $table=TableBankingLoan::where('is_approved',1)->sum('amount_without_interest');

        $inst_share=InstitutionalShare::where('is_approved',1)->sum('amount_without_interest');
        $share=ShareAccount::where('is_approved',1)->sum('amount_without_interest');

        $general_ledgers = GeneralLedger::all();
        $positive = GeneralLedger::where('amount','>=',0)->sum('amount');
        $negative = GeneralLedger::where('amount','<',0)->sum('amount');
       
        $loans_sum=$emergency+$normal+$table;
        $shares_sum=$inst_share+$share;

        $final_assets=($loans_sum*-1)+$positive;
        $final_liability=$shares_sum+($negative*-1);

        return view('admin.trial',compact(
        'general_ledgers',
        'emergency',
        'normal',
        'table',
        'inst_share',
        'share',
        'final_assets',
        'final_liability',
    ));
    }
    public function get_page(){
        return view('admin.generate-reports');
    }
    public function generate_reports(Request $request){
        $validated=$request->validate([
            'account_number'=>'required|numeric',
            'start_date'=>'required',
            'end_date'=>'required'
        ]);

        $start=$request->start_date;
        $end=$request->end_date;

        $number=$request->account_number;

        if(100000<=$number && $number<=199999){
            $records=Record::join('users','users.id','=','records.user_id')
            ->join('account_details','account_details.id','=','records.details_id')
            ->whereBetween(DB::raw('DATE(records.created_at)'), [$request->start_date, $request->end_date])
            ->where('account_id',$request->account_number)
            ->select(
                'account_details.account_type',
                'records.created_at',
                'records.type',
                'records.amount_without_interest',
                'records.account_id',
                'records.description',
                'users.name',
                'users.phone_number',
                DB::raw('sum(records.amount_without_interest) over (order by records.id) as cf')
            )
            ->get();

         
           
        }
        elseif (200000<=$number && $number<=299999) {
            $records=Record::join('users','users.id','=','records.user_id')
        ->join('account_details','account_details.id','=','records.details_id')
        ->whereBetween(DB::raw('DATE(records.created_at)'), [$request->start_date, $request->end_date])
        ->where('account_id',$request->account_number)
        ->select(
            'account_details.account_type',
            'records.created_at',
            'records.type',
            'records.amount_without_interest',
            'records.description',
            'records.account_id',
            'users.name',
            'users.phone_number',
            DB::raw('sum(records.amount_without_interest) over (order by records.id) as cf')
        )
        ->get();
        }
        elseif (300000<=$number && $number<=399999) {
            $records=Record::join('users','users.id','=','records.user_id')
        ->join('account_details','account_details.id','=','records.details_id')
        ->whereBetween(DB::raw('DATE(records.created_at)'), [$request->start_date, $request->end_date])
        ->where('account_id',$request->account_number)
        ->select(
            'account_details.account_type',
            'records.created_at',
            'records.type',
            'records.amount_without_interest',
            'records.description',
            'records.account_id',
            'users.name',
            'users.phone_number',
            DB::raw('sum(records.amount_without_interest) over (order by records.id) as cf')
        )
        ->get();
        }
        elseif (400000<=$number && $number<=499999) {
            $records=Record::join('users','users.id','=','records.user_id')
            ->join('account_details','account_details.id','=','records.details_id')
            ->whereBetween(DB::raw('DATE(records.created_at)'), [$request->start_date, $request->end_date])
            ->where('account_id',$request->account_number)
            ->select(
                'account_details.account_type',
                'records.created_at',
                'records.type',
                'records.amount_without_interest',
                'records.description',
                'records.account_id',
                'users.name',
                'users.phone_number',
                DB::raw('sum(records.amount_without_interest) over (order by records.id) as cf')
            )
            ->get();
        }
        elseif (500000<=$number && $number<=599999) {
            $records=Record::join('users','users.id','=','records.user_id')
            ->join('account_details','account_details.id','=','records.details_id')
            ->whereBetween(DB::raw('DATE(records.created_at)'), [$request->start_date, $request->end_date])
            ->where('account_id',$request->account_number)
            ->select(
                'account_details.account_type',
                'records.created_at',
                'records.type',
                'records.amount_without_interest',
                'records.description',
                'records.account_id',
                'users.name',
                'users.phone_number',
                DB::raw('sum(records.amount_without_interest) over (order by records.id) as cf')
            )
            ->get();
        }
        else{
            return back()->with("info","Such account does not exist");
        }

        return view('admin.range-report',compact('records', 'start', 'end',));
    }
}
