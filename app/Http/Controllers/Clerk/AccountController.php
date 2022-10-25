<?php

namespace App\Http\Controllers\Clerk;

use App\Http\Controllers\Controller;
use App\Models\AccountDetail;
use App\Models\EmergencyLoan;
use App\Models\GeneralLedger;
use App\Models\InstitutionalShare;
use App\Models\NormalShare;
use App\Models\Record;
use App\Models\ShareAccount;
use App\Models\TableBankingLoan;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    public function create($id){
        $types=AccountDetail::all();
        $user=User::where('id',$id)->first();
        return view('clerk.open-account-type',compact('types','user'));
    }

    public function store(Request $req){
        $validated=$req->validate([
            'account_type'=>'required|string',
            'user_id'=>'required',
        ]);

        $record= new Record();

        if ($req->account_type==1) {
            $share_account= new ShareAccount();
            $share_account->user_id=$req->input('user_id');
            $share_account->details_id=$req->input('account_type');
            $result=$share_account->save();


            $acc_share=ShareAccount::where('user_id',$req->user_id)->first();

            $record->details_id=$req->input('account_type');
            $record->user_id=$req->input('account_type');
            $record->account_id=$acc_share->id;
            $res=$record->save();
            
            if ($result && $res){
                Alert::html("information","<b>Share Account opened Successfully, Account number: $acc_share->id<b>","success");
                return back()->with("info","Share Account Opened Successfully, Account Number: $acc_share->id");
            }
        } 
        elseif ($req->account_type==2) {
            $institutional_share= new InstitutionalShare();
            $institutional_share->user_id=$req->input('user_id');
            $institutional_share->details_id=$req->input('account_type');
            $result=$institutional_share->save();

            $acc_inst=InstitutionalShare::where('user_id',$req->user_id)->first();

            $record->details_id=$req->input('account_type');
            $record->user_id=$req->input('account_type');
            $record->account_id=$acc_inst->id;
            $res=$record->save();

            if ($result && $res){
                Alert::success("information","Institutional share Account opened Successfully, Account number: $acc_inst->id");
                return back()->with("info","Institutional Share Account Opened Successfully, Account Number: $acc_inst->id");
            }
        }
        elseif ($req->account_type==3) {
            $normal_share= new NormalShare();
            $normal_share->user_id=$req->input('user_id');
            $normal_share->details_id=$req->input('account_type');

            $result=$normal_share->save();

            $acc_norm=NormalShare::where('user_id',$req->user_id)->first();

            $record->details_id=$req->input('account_type');
            $record->user_id=$req->input('account_type');
            $record->account_id=$acc_norm->id;
            $res=$record->save();

            if ($result && $res){
                Alert::success("information","Normal loans Account opened Successfully, Account number: $acc_norm->id");
                return back()->with("info","Normal Share Account Opened Successfully, Account Number: $acc_norm->id");
            }
        }
        elseif ($req->account_type==4) {
            $table_banking= new TableBankingLoan();
            $table_banking->user_id=$req->input('user_id');
            $table_banking->details_id=$req->input('account_type');

            $result=$table_banking->save();
            $acc_table=TableBankingLoan::where('user_id',$req->user_id)->first();

            $record->details_id=$req->input('account_type');
            $record->user_id=$req->input('account_type');
            $record->account_id=$acc_table->id;
            $res=$record->save();

            if ($result && $res){
                Alert::success("information","Table banking Account opened Successfully, Account number: $acc_table->id");
                return back()->with("info","Table Banking Loan Account Opened Successfully, Account Number: $acc_table->id");
            }
        }
        elseif ($req->account_type==5) {
            $emergency_loan= new EmergencyLoan();
            $emergency_loan->user_id=$req->input('user_id');
            $emergency_loan->details_id=$req->input('account_type');

            $result=$emergency_loan->save();
            $acc_emerg=EmergencyLoan::where('user_id',$req->user_id)->first();

            $record->details_id=$req->input('account_type');
            $record->user_id=$req->input('account_type');
            $record->account_id=$acc_emerg->id;
            $res=$record->save();

            if ($result && $res){
                Alert::success("information","Emergency loan account opened Successfully, Account number: $acc_emerg->id");
                return back()->with("info","Emergency Loan Account Opened Successfully, Account Number: $acc_emerg->id");
            }
        }
    }

    public function get_number_page(){
        return view('clerk.account-number');
    }
    public function search_number(Request $request){
        $validated=$request->validate([
            'account_number'=>'required|numeric|digits:6'
        ]);

        $number=$request->account_number;

        if(100000<=$number && $number<=199999){
            $account=ShareAccount::where('id','LIKE','%'.$number.'%')->first();
            $user=User::where('id',$account->user_id)->first();
            $details=AccountDetail::where('id',$account->details_id)->first();
            return view('clerk.allocate-cash',compact('account','user','details'));
        }
        elseif (200000<=$number && $number<=299999) {
            $account=InstitutionalShare::where('id','LIKE','%'.$number.'%')->first();
            $user=User::where('id',$account->user_id)->first();
            $details=AccountDetail::where('id',$account->details_id)->first();
            return view('clerk.allocate-cash',compact('account','user','details'));
        }
        elseif (300000<=$number && $number<=399999) {
            $account=NormalShare::where('id','LIKE','%'.$number.'%')->first();
            $user=User::where('id',$account->user_id)->first();
            $details=AccountDetail::where('id',$account->details_id)->first();
            return view('clerk.allocate-cash',compact('account','user','details'));
        }
        elseif (400000<=$number && $number<=499999) {
            $account=TableBankingLoan::where('id','LIKE','%'.$number.'%')->first();
            $user=User::where('id',$account->user_id)->first();
            $details=AccountDetail::where('id',$account->details_id)->first();
            return view('clerk.allocate-cash',compact('account','user','details'));
        }
        elseif (500000<=$number && $number<=599999) {
            $account=EmergencyLoan::where('id','LIKE','%'.$number.'%')->first();
            $user=User::where('id',$account->user_id)->first();
            $details=AccountDetail::where('id',$account->details_id)->first();
            return view('clerk.allocate-cash',compact('account','user','details'));
        }
        elseif (600000<=$number && $number<=699999) {
            $account=GeneralLedger::where('id','LIKE','%'.$number.'%')->first();
            $user=User::where('id',$account->user_id)->first();
            $details=AccountDetail::where('id',$account->details_id)->first();
            return view('clerk.allocate-cash',compact('account','user','details'));
        }
        else{
            return back()->with("info","No results found for the account number");
        }
    }


    public function store_allocation(Request $request){
        $validated=$request->validate([
            'type'=>'required|boolean',
            'amount'=>'required|numeric'
        ]);

        $number=$request->account;

       
        
        if(100000<=$number && $number<=199999){
            $account=ShareAccount::where('id',$number)->first();
            $account->type=$request->input('type');
            if($request->type==1){
                $money=$request->amount+$account->amount_without_interest;
            }
            elseif($request->type==0){
                $money=$account->amount_without_interest-$request->amount;
            }
           
            $account->amount_without_interest=$money;
            $result=$account->save();

            $record=new Record();

            $record->amount_without_interest=$request->input('amount');
            $record->type=$request->input('type');
            $record->account_id=$account->id;
            $record->details_id=$account->details_id;
            $record->user_id=$account->user_id;
            $res=$record->save();

            if ($result && $res) {
                Alert::success("information","Share Amount allocated successfully");
                return redirect()->route('cashing')->with("info","allocated successfully");
            }
        }
        elseif (200000<=$number && $number<=299999) {
            $account=InstitutionalShare::where('id',$number)->first();
            $account->type=$request->input('type');
            if($request->type==1){
                $money=$request->amount+$account->amount_without_interest;
            }
            elseif($request->type==0){
                $money=$account->amount_without_interest-$request->amount;
            }
            $account->amount_without_interest=$money;
            $result=$account->save();

            $record=new Record();

            $record->amount_without_interest=$request->input('amount');
            $record->type=$request->input('type');
            $record->account_id=$account->id;
            $record->details_id=$account->details_id;
            $record->user_id=$account->user_id;
            $res=$record->save();

            if ($result && $res) {
                Alert::success("information","Institutional share Amount allocated successfully");
                return redirect()->route('cashing')->with("info","allocated successfully");
            }
        }
        elseif (300000<=$number && $number<=399999) {
            $account=NormalShare::where('id',$number)->first();
            $interest=AccountDetail::where('id',$account->details_id)->first();
            $account->type=$request->input('type');
             if($request->type==1){
                $money=$request->amount+$account->amount_without_interest;
            }
            elseif($request->type==0){
                $money=$account->amount_without_interest-$request->amount;
            }

            if ($account->amount_without_interest==null) {
                $interested=$money*(100+$interest->interest)/100;
                $account->amount_without_interest=$interested;
            } else {
                $account->amount_without_interest=$money;
            }
            
           
            $result=$account->save();

            $record=new Record();

            $record->amount_without_interest=$request->input('amount');
            $record->type=$request->input('type');
            $record->account_id=$account->id;
            $record->details_id=$account->details_id;
            $record->user_id=$account->user_id;
            $res=$record->save();

            if ($result && $res) {
                Alert::success("information","Normal Share Amount allocated successfully");
                return redirect()->route('cashing')->with("info","allocated successfully");
            }
        }
        elseif (400000<=$number && $number<=499999) {
            $account=TableBankingLoan::where('id',$number)->first();
            $interest=AccountDetail::where('id',$account->details_id)->first();
            $account->type=$request->input('type');
             if($request->type==1){
                $money=$request->amount+$account->amount_without_interest;
            }
            elseif($request->type==0){
                $money=$account->amount_without_interest-$request->amount;
            }
            // $account->amount_without_interest=$money;

            if ($account->amount_without_interest==null) {
                $interested=$money*(100+$interest->interest)/100;
                $account->amount_without_interest=$interested;
            } else {
                $account->amount_without_interest=$money;
            }
            
            $result=$account->save();

             $record=new Record();

            $record->amount_without_interest=$request->input('amount');
            $record->type=$request->input('type');
            $record->account_id=$account->id;
            $record->details_id=$account->details_id;
            $record->user_id=$account->user_id;
            $res=$record->save();

            if ($result && $res) {
                Alert::success("information","Table banking loan Amount allocated successfully");
                return redirect()->route('cashing')->with("info","allocated successfully");
            }
        }
        elseif (500000<=$number && $number<=599999) {
            $account=EmergencyLoan::where('id',$number)->first();
            $interest=AccountDetail::where('id',$account->details_id)->first();
            $account->type=$request->input('type');
             if($request->type==1){
                $money=$request->amount+$account->amount_without_interest;
            }
            elseif($request->type==0){
                $money=$account->amount_without_interest-$request->amount;
            }
            // $account->amount_without_interest=$money;
            if ($account->amount_without_interest==null) {
                $interested=$money*(100+$interest->interest)/100;
                $account->amount_without_interest=$interested;
            } else {
                $account->amount_without_interest=$money;
            }
            $result=$account->save();

            $record=new Record();

            $record->amount_without_interest=$request->input('amount');
            $record->type=$request->input('type');
            $record->account_id=$account->id;
            $record->details_id=$account->details_id;
            $record->user_id=$account->user_id;
            $res=$record->save();

            if ($result && $res) {
                Alert::success("information","Emergency loan Amount allocated successfully");
                return redirect()->route('cashing')->with("info","allocated successfully");
            }
        }
        else{
            return back()->with("info","Error occurred while allocating cash");
        }

        
    }
}
