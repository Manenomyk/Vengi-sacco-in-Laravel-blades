<?php

namespace App\Http\Controllers\Authorizer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmergencyLoan;
use App\Models\GeneralLedger;
use App\Models\InstitutionalShare;
use App\Models\NormalShare;
use App\Models\ShareAccount;
use App\Models\TableBankingLoan;
use RealRashid\SweetAlert\Facades\Alert;

class ApproveController extends Controller
{
    public function share(Request $request, $id){
        
        $approve=ShareAccount::find($id);

        if($request->approve==1){
            $approve->is_approved="1";
            $result=$approve->update();
            if($result){
                Alert::success("Message","Share Account Approved successfully");
                return back()->with("message", "Approved successfully");
            }
        }

        else{
            $result=$approve->delete();
            if($result){
                Alert::success("Message","Share Account Declined successfully");
                return back()->with("message", "Declined successfully");
            }
        }
    }
    public function emergency(Request $request, $id){
        
        $approve=EmergencyLoan::find($id);

        if($request->approve==1){
            $approve->is_approved="1";
            $result=$approve->update();
            if($result){
                Alert::success("Message","Emergency loan Approved successfully");
                return back()->with("message", "Approved successfully");
            }
        }

        else{
            $result=$approve->delete();
            if($result){
                Alert::success("Message","Emergency loan Declined successfully");
                return back()->with("message", "Declined successfully");
            }
        }
    }
    public function table(Request $request, $id){
        
        $approve=TableBankingLoan::find($id);

        if($request->approve==1){
            $approve->is_approved="1";
            $result=$approve->update();
            if($result){
                Alert::success("Message","Table banking loan Approved successfully");
                return back()->with("message", "Approved successfully");
            }
        }

        else{
            $result=$approve->delete();
            if($result){
                Alert::success("Message","Table banking loan Declined successfully");
                return back()->with("message", "Declined successfully");
            }
        }
    }

    public function normal(Request $request, $id){
        
        $approve=NormalShare::find($id);

        if($request->approve==1){
            $approve->is_approved="1";
            $result=$approve->update();
            if($result){
                Alert::success("Message","Normal loan  Approved successfully");
                return back()->with("message", "Approved successfully");
            }
        }

        else{
            $result=$approve->delete();
            if($result){
                Alert::success("Message","Normal loan Declined successfully");
                return back()->with("message", "Declined successfully");
            }
        }
    }

    public function inst(Request $request, $id){
        
        $approve=InstitutionalShare::find($id);

        if($request->approve==1){
            $approve->is_approved="1";
            $result=$approve->update();
            if($result){
                Alert::success("Message","Institutional share account Approved successfully");
                return back()->with("message", "Approved successfully");
            }
        }

        else{
            $result=$approve->delete();
            if($result){
                Alert::success("Message","Institutional account Declined successfully");
                return back()->with("message", "Declined successfully");
            }
        }
    }

    public function ledger(Request $request, $id){
        
        $approve=GeneralLedger::find($id);

        if($request->approve==1){
            $approve->is_approved="1";
            $result=$approve->update();
            if($result){
                Alert::success("Message","General ledger Approved successfully");
                return back()->with("message", "Approved successfully");
            }
        }

        else{
            $result=$approve->delete();
            if($result){
                Alert::success("Message","General ledger Declined successfully");
                return back()->with("message", "Declined successfully");
            }
        }
    }
}
