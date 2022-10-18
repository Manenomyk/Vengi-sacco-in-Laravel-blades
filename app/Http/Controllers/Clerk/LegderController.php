<?php

namespace App\Http\Controllers\Clerk;

use Illuminate\Http\Request;
use App\Models\GeneralLedger;
use App\Http\Controllers\Controller;

class LegderController extends Controller
{
    public function create(){
        return view('clerk.ledger-account');
    }

    public function gen_ledgers(){
       
        $general_ledgers = GeneralLedger::paginate();

        return view('clerk.ledger',compact('general_ledgers'));

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

        $result=$ledger->save();

        if($result){
            return back()->with("message","$request->amount allocated successfully. Total: $final");
        }

    }
}
