<?php

namespace App\Http\Controllers\Clerk;

use Illuminate\Http\Request;
use App\Models\AccountDetail;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AccountType extends Controller
{
    public function index(){
        $account_type=AccountDetail::all();
        return view('clerk.account-type',compact('account_type'));
    }
    public function create(){
        return view('clerk.add-account-type');
    }

    public function store(Request $request){
        $validated=$request->validate([
            'account_type_name'=>'required|string',
            'interest_rate'=>'required|digits_between:1,100',
            'duration'=>'required|numeric'
        ]);

        $account_type=new AccountDetail();

        $account_type->account_type=$request->input('account_type_name');
        $account_type->interest=$request->input('interest_rate');
        $account_type->duration=$request->input('duration');

        $result=$account_type->save();

        if($result){
            Alert::success("information","The $request->account_type_name account type has been created successfully");
            return back()->with("message","The $request->account_type_name account type has been created successfully");
        }
        else{
            return back()->with("issue","Error in creating account type");
        }

    }
}
