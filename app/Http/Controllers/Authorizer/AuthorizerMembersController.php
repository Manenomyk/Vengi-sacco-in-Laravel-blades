<?php

namespace App\Http\Controllers\Authorizer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class AuthorizerMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member=User::where('role',3)->paginate(10);
        return view('authorizer.authorizer-members',compact('member'));
    }

    public function unapproved_members(){
        $member=User::where('role',3)->where('is_approved',0)->paginate(6);
        return view('authorizer.authorizer-memberspending',compact('member'));
    }

    public function approve(Request $request, $id){
        
        $approve=User::find($id);

        if($request->approve==1){
            $approve->is_approved="1";
            $result=$approve->update();
            if($result){
                return back()->with("message", "The member has been approved successfully");
            }
        }

        else{
            $result=$approve->delete();
            if($result){
                return back()->with("message", "The member has been declined successfully");
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
