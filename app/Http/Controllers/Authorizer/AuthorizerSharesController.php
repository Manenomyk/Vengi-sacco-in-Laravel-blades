<?php

namespace App\Http\Controllers\Authorizer;

use App\Models\Share;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorizerSharesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $share=Share::join('users','users.id','=','shares.user_id')
        ->select('shares.shares_amount','shares.id','shares.user_id','shares.is_approved','shares.share_type_id','users.name')
        ->get();
        return view('authorizer.authorizer-shares',compact('share'));
    }

    public function unapproved_shares(){
        $share=Share::join('users','users.id','=','shares.user_id')
        ->where('shares.is_approved','pending')
        ->select('shares.shares_amount','shares.id','shares.user_id','shares.is_approved','shares.share_type_id','users.name')
        ->get();
        return view('authorizer.authorizer-sharespending',compact('share'));
    }

    public function approve(Request $request, $id){
        
        $approve=Share::find($id);

        if($request->approve==1){
            $approve->is_approved="approve";
            $result=$approve->update();
            if($result){
                return back()->with("message", "The share has been approved successfully");
            }
        }

        else{
            $result=$approve->delete();
            if($result){
                return back()->with("message", "The shares has been declined successfully");
            }
        }

       
       
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
