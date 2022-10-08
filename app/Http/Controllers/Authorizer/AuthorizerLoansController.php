<?php

namespace App\Http\Controllers\Authorizer;

use App\Models\Loan;
use App\Models\LoanType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class AuthorizerLoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $loan=Loan::join('users','users.id','=','loans.user_id')
        // ->select('loans.loan_amount','loans.id','loans.due_date','loans.is_approved','loans.user_id','loans.loans_type_id','users.name')
        // ->paginate(10);
        return view('authorizer.authorizer-loans');
    }

    public function unapproved_loans()
    {
        // $loan=Loan::join('users','users.id','=','loans.user_id')
        // ->where('loans.is_approved',0)
        // ->select('loans.loan_amount','loans.id','loans.due_date','loans.is_approved','loans.user_id','loans.loans_type_id','users.name')
        // ->paginate(6);
        return view('authorizer.authorizer-loanspending');
    }

    public function approve(Request $request, $id){
        
        // $approve=Loan::find($id);
        
        // $loan_type=LoanType::where('id',$approve->loans_type_id)->first();
        // $due_date=Carbon::now()->addMonths($loan_type->duration);

        // if($request->approve==1){
        //     $approve->is_approved=$request->input('approve');
        //     $approve->due_date=$due_date;
        //     $result=$approve->update();
        //     if($result){
        //         return back()->with("message", "The loans has been approved successfully");
        //     }
        // }

        // else{
        //     $result=$approve->delete();
        //     if($result){
        //         return back()->with("message", "The loans has been declined successfully");
        //     }
        // }

       
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
