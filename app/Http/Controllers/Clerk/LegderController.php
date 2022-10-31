<?php

namespace App\Http\Controllers\Clerk;

use App\Models\User;
use App\Models\NormalShare;
use App\Models\ShareAccount;
use Illuminate\Http\Request;
use App\Models\EmergencyLoan;
use App\Models\GeneralLedger;
use App\Models\TableBankingLoan;
use App\Models\InstitutionalShare;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class LegderController extends Controller
{
    public function create(){
        return view('clerk.ledger-account');
    }

    public function gen_ledgers(){

        $emergency=EmergencyLoan::where('is_approved',1)->sum('amount_without_interest');
        $normal=NormalShare::where('is_approved',1)->sum('amount_without_interest');
        $table=TableBankingLoan::where('is_approved',1)->sum('amount_without_interest');

        $inst_share=InstitutionalShare::where('is_approved',1)->sum('amount_without_interest');
        $share=ShareAccount::where('is_approved',1)->sum('amount_without_interest');

        $general_ledgers = GeneralLedger::all();

        return view('clerk.ledger',compact('general_ledgers','emergency','normal','table','inst_share','share'));

    }
    public function store(Request $request){
        $validated=$request->validate([
            'name'=>'required|unique:general_ledgers,name'
        ]);

        $ledger=new GeneralLedger();

        $ledger->name=$request->input('name');

        $result=$ledger->save();

        if($result){
            return back()->with("message","$request->name created successfully");
        }
    }

    public function edit($id){
        $ledger=GeneralLedger::where('id',$id)->first();
        return view('clerk.fund-ledger',compact('ledger'));
    }

    public function update(Request $request,$id){

        $validated=$request->validate([
            'amount'=>'required|numeric',
            'type'=>'required|boolean'
        ]);

        $ledger=GeneralLedger::find($id);

        if($request->type==0){
            $final=$ledger->amount-$request->amount;
        }
        elseif ($request->type==1) {
            $final=$ledger->amount+$request->amount;
        }


        $ledger->amount=$final;
        $ledger->is_approved=0;

        $result=$ledger->save();

        if($result){
            Alert::success("Information", "$request->amount allocated successfully. Total: $final");
            return back()->with("message","$request->amount allocated successfully. Total: $final");
        }

    }
}
