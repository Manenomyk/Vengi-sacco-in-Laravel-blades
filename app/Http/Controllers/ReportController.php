<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function emergency(){
        $normal_report=Record::join('account_details','account_details.id','=','records.details_id')
        ->join('normal_shares','normal_shares.id','=','records.account_id')
        ->select(
            'account_details.account_type',
            'records.type',
            'records.amount_without_interest',
            'records.created_at'
        )
        ->get();
        // $shares_report=Record::join('account_details','account_details.id','=','records.details_id')
        // ->join('normal_shares','normal_shares.id','=','records.account_id')
        // ->select(
        //     'account_details.account_type',
        //     'records.type',
        //     'records.amount_without_interest',
        //     'records.created_at'
        // )
        // ->get();
        // $normal_report=Record::join('account_details','account_details.id','=','records.details_id')
        // ->join('normal_shares','normal_shares.id','=','records.account_id')
        // ->select(
        //     'account_details.account_type',
        //     'records.type',
        //     'records.amount_without_interest',
        //     'records.created_at'
        // )
        // ->get();
        // $normal_report=Record::join('account_details','account_details.id','=','records.details_id')
        // ->join('normal_shares','normal_shares.id','=','records.account_id')
        // ->select(
        //     'account_details.account_type',
        //     'records.type',
        //     'records.amount_without_interest',
        //     'records.created_at'
        // )
        // ->get();

        return view('admin.report',compact('normal_report'));
    }
}
