<?php

namespace App\Http\Controllers\Clerk;

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

class ClerkReportController extends Controller
{
    public function index(){
        $emergency=EmergencyLoan::where('is_approved',1)->sum('amount_without_interest');
        $normal=NormalShare::where('is_approved',1)->sum('amount_without_interest');
        $table=TableBankingLoan::where('is_approved',1)->sum('amount_without_interest');

        $inst_share=InstitutionalShare::where('is_approved',1)->sum('amount_without_interest');
        $share=ShareAccount::where('is_approved',1)->sum('amount_without_interest');

        $general_ledgers = GeneralLedger::all();

        $loans_sum=$emergency+$normal+$table;
        $shares_sum=$inst_share+$share;

        return view('clerk.trial',compact('general_ledgers',
        'emergency',
        'normal',
        'table',
        'inst_share',
        'share',
        'loans_sum',
        'shares_sum',
    ));
    }
    public function get_page(){
        return view('clerk.generate-reports');
    }
    public function generate_reports(Request $request){
        $validated=$request->validate([
            'account_number'=>'required|numeric',
            'start_date'=>'required',
            'end_date'=>'required'
        ]);

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
                'users.name',
                'users.phone_number'
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
            'records.account_id',
            'users.name',
            'users.phone_number'
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
            'records.account_id',
            'users.name',
            'users.phone_number'
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
                'records.account_id',
                'users.name',
                'users.phone_number'
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
                'records.account_id',
                'users.name',
                'users.phone_number'
            )
            ->get();
        }
        else{
            return back()->with("info","Such account does not exist");
        }

        return view('clerk.range-report',compact('records'));
    }
}
