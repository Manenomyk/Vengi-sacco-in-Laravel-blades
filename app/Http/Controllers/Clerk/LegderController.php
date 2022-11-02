<?php

namespace App\Http\Controllers\Clerk;

use App\Models\User;
use App\Models\NormalShare;
use App\Models\LedgerRecord;
use App\Models\ShareAccount;
use Illuminate\Http\Request;
use App\Models\EmergencyLoan;
use App\Models\GeneralLedger;
use App\Models\TableBankingLoan;
use App\Models\InstitutionalShare;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        DB::beginTransaction();

        $validated=$request->validate([
            'name'=>'required|unique:general_ledgers,name',
            'description'=>'required|string|max:100'
        ]);

        $ledger=new GeneralLedger();
        $ledger_record=new LedgerRecord();
        try {
        $ledger->name=$request->input('name');
        $result=$ledger->save();
        } catch (\Throwable $th) {
           return back()->with("message","An Error occurred");
           DB::rollBack();
        }
        try {
            $get_created=GeneralLedger::where('name',$request->name)->first();
            $ledger_record->name=$request->input('name');
            $ledger_record->description=$request->input('description');
            $ledger_record->user_id=Auth::user()->id;
            $ledger_record->ledger_id=$get_created->id;
            $res=$ledger_record->save();
        } catch (\Throwable $th) {
            return back()->with("message","An Error occurred");
            DB::rollBack();
        }

        DB::commit();
        if($result && $res){
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
            'type'=>'required|boolean',
            'description'=>'required|string|max:100'
        ]);
        $ledger=GeneralLedger::find($id);
        if($ledger->is_approved==0){
            return back()->with("message","Please the previous ledger has not been approved");
        }
        DB::beginTransaction();
        try {
            if($request->type==0){
                $final=$ledger->amount-$request->amount;
            }
            elseif ($request->type==1) {
                $final=$ledger->amount+$request->amount;
            }
            $ledger->amount=$final;
            $ledger->is_approved=0;
    
            $result=$ledger->save();
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
            DB::rollBack();
        }
        try {
            $ledger_record=new LedgerRecord();
            $ledger_record->type=$request->input('type');
            $ledger_record->name=$ledger->name;
            $ledger_record->amount=$request->input('amount');
            $ledger_record->description=$request->input('description');
            $ledger_record->user_id=Auth::user()->id;
            $ledger_record->ledger_id=$ledger->id;
            $res=$ledger_record->save();
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
            DB::rollBack();
        }

        DB::commit();
        if($result && $res){
            Alert::success("Information", "$request->amount allocated successfully. Total: $final");
            return back()->with("message","$request->amount allocated successfully. Total: $final");
        }

    }
}
