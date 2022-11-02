<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Record;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmergencyLoan;
use App\Models\InstitutionalShare;
use App\Models\NormalShare;
use App\Models\ShareAccount;
use App\Models\TableBankingLoan;
use RealRashid\SweetAlert\Facades\Alert;

class AdminMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $member = User::where('role', 3)->where('name', 'LIKE', '%' . $request->name . '%')->paginate(10);
        }
        elseif($request->isMethod('get')){
            $member = User::where('role', 3)->paginate(10);
        }
       
        return view('admin.admin-members',compact('member'));
    }

    public function unapproved_members()
    {
        $member = User::where('role', 3)->where('is_approved', 0)->paginate(10);
        return view('admin.admin-memberspending',compact('member'));
    }
    public function member_report($id){
        $report=Record::join('users','users.id','=','records.user_id')
        ->join('account_details','account_details.id','=','records.details_id')
        ->where('records.user_id',$id)
        ->select(
            'users.name',
            'users.id_number',
            'users.is_approved',
            'records.amount_without_interest',
            'records.type',
            'records.due_date',
            'records.created_at',
            'records.description',
            'records.account_id',
            'account_details.account_type',
            'account_details.duration'
        )
        ->get();

        return view('admin.member-report',compact('report'));
    }

    public function destroy($id){
        
        $emergency=EmergencyLoan::where('user_id',$id)->delete();
        $inst=InstitutionalShare::where('user_id',$id)->delete();
        $normal=NormalShare::where('user_id',$id)->delete();
        $share=ShareAccount::where('user_id',$id)->delete();
        $table=TableBankingLoan::where('user_id',$id)->delete();
        $user=User::where('id',$id)->delete();
        Alert::success("message","User Has been archived Successfully");
        
        return back();
        
    }

    public function archived(){

        $user=User::onlyTrashed()->paginate(10);
       return view('admin.archive',compact('user'));
    }
    public function archived_restore($id){
        User::where('id', $id)->restore();
        $emergency=EmergencyLoan::where('user_id',$id)->restore();
        $inst=InstitutionalShare::where('user_id',$id)->restore();
        $normal=NormalShare::where('user_id',$id)->restore();
        $share=ShareAccount::where('user_id',$id)->restore();
        $table=TableBankingLoan::where('user_id',$id)->restore();

       return back();
    }

   
   
}
