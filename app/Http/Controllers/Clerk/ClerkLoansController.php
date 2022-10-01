<?php

namespace App\Http\Controllers\Clerk;

use App\Models\Loan;
use App\Models\User;
use App\Models\Share;
use App\Models\LoanType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class ClerkLoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loan=Loan::join('users','users.id','=','loans.user_id')->get();
        return view('clerk.clerk-loans',compact('loan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member=User::where('role',3)->get();
        $type=LoanType::all();
        return view('clerk.clerk-addloans',compact('member','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'loan_amount'=>'required|string|max:50',
            'loans_type_id'=>'required|string',
        ]);

        $loan_type=LoanType::where('id',$request->loans_type_id)->first();
        $due_date=Carbon::now()->addMonths($loan_type->duration);

        $share=Share::where('user_id',$request->user_id)->first();
        
        $value=$share->shares_amount;

        $eligible_loan=$value/0.5;

        $loan=new Loan();

        $loan->user_id=$request->input('user_id');
        $get_amount=$request->loan_amount;
        if ($get_amount>$eligible_loan) {
            return back()->with("message","The user is eligible to borrow only $eligible_loan shillings");
        }
        $loan->loan_amount=$request->input('loan_amount');
        $loan->loans_type_id=$request->input('loans_type_id');
        $loan->due_date=$due_date;
        $loan->share_id=$share->id;
      

        $result=$loan->save();

        if($result){
            return back()->with("message","Loans allocated successfully, pending for approval");
        }
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
