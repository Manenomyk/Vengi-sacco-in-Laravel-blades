<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function emergency(){
        $all_reports=Record::join('account_details','account_details.id','=','records.details_id')
        ->select(
            'account_details.account_type',
            'records.type',
            'records.amount_without_interest',
            'records.created_at'
        )
        ->paginate(8);

        return view('admin.report',compact('all_reports'));
    }
}
