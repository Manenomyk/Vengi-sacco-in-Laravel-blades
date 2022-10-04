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
        $loan=Loan::join('users','users.id','=','loans.user_id')
        ->select('loans.loan_amount','loans.id','loans.due_date','loans.is_approved','loans.user_id','loans.loans_type_id','users.name')
        ->paginate(10);
        return view('clerk.clerk-loans',compact('loan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member=User::where('role',3)->where('is_approved',1)->get();
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

        $not_approved=User::where('id',$request->user_id)->first();
        if($not_approved->is_approved==0){
            return back()->with("issue","The user has not been approved, contact the authorizer");
        }
    
        $loan_type=LoanType::where('id',$request->loans_type_id)->first();
        $due_date=Carbon::now()->addMonths($loan_type->duration);

        $share=Share::where('user_id',$request->user_id)->where('is_approved','approve')->sum('shares_amount');

        

        if(!$share){
            return back()->with("issue","The user does not have any shares");
        }
        $eligible_loan=$share/2;

        $other_loans=Loan::where('user_id',$request->user_id)->sum('loan_amount');

        $final_eligible=$eligible_loan-$other_loans;


        $loan=new Loan();

        $loan->user_id=$request->input('user_id');
        $get_amount=$request->loan_amount;
        if ($get_amount>$final_eligible) {
            return back()->with("issue","The user is eligible to borrow only $final_eligible shillings");
        }
        //calculate interest
        $interest_calc=$request->loan_amount;
        $final_interest_amount=$interest_calc*1.05;
        $final_amount=round($final_interest_amount);

        $loan->loan_amount=$final_amount;
        $loan->loans_type_id=$request->input('loans_type_id');
        $loan->due_date=$due_date;

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
