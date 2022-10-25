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

        $emergency=EmergencyLoan::sum('amount_without_interest');
        $normal=NormalShare::sum('amount_without_interest');
        $table=TableBankingLoan::sum('amount_without_interest');

        $inst_share=InstitutionalShare::where('is_approved',1)->sum('amount_without_interest');
        $share=ShareAccount::where('is_approved',1)->sum('amount_without_interest');

        $general_ledgers = GeneralLedger::paginate();

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
        // $cash=GeneralLedger::where('id',600004)->first();

        if($request->type==0){
            $final=$ledger->amount-$request->amount;
        }
        elseif ($request->type==1) {
            $final=$ledger->amount+$request->amount;
            // if($request->amount>$cash->amount){
            //     return back()->with("message","No enough cash available for allocation");
            // }
            // $new_cash=$cash->amount-$request->amount;
            // $cash->amount=$new_cash;
        }


        $ledger->amount=$final;

        $result=$ledger->save();

        // $res=$cash->save();

        if($result){
            Alert::success("Information", "$request->amount allocated successfully. Total: $final");
            return back()->with("message","$request->amount allocated successfully. Total: $final");
        }

    }
}
