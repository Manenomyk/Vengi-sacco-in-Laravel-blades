<?php

namespace App\Http\Controllers\Admin;

use App\Models\Loan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoansController extends Controller
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
        ->get();
        return view('admin.admin-loans',compact('loan'));
    }

    public function unapproved_loans(){
        $loan=Loan::join('users','users.id','=','loans.user_id')->where('loans.is_approved',0)->get();
        return view('admin.admin-loanspending',compact('loan'));
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
