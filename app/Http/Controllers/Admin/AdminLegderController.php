<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LedgerRecord;
use Illuminate\Http\Request;

class AdminLegderController extends Controller
{
    public function index(){
        $ledger_records=LedgerRecord::join('users','users.id','ledger_records.user_id')
        ->select(
            'users.name as username',
            'ledger_records.name',
            'ledger_records.description',
            'ledger_records.type',
            'ledger_records.amount',
            'ledger_records.ledger_id',
            'ledger_records.created_at'
        )
        ->paginate(10);
      return view('admin.ledger-report',compact('ledger_records'));
    }
}
