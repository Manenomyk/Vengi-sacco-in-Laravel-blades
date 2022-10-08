<?php

namespace App\Http\Controllers\Clerk;

use App\Models\User;
use App\Models\Share;
use App\Models\ShareType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SharesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $share=Share::join('users','users.id','=','shares.user_id')
        // ->select('shares.shares_amount','shares.id','shares.user_id','shares.is_approved','shares.share_type_id','users.name')
        // ->paginate(10);
        return view('clerk.clerk-shares');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $member=User::where('role',3)->where('is_approved',1)->get();
        // $type=ShareType::all();
        return view('clerk.clerk-addshares');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'user_id' => 'required|integer',
        //     'shares_amount'=>'required|string|max:50',
        //     'share_type_id'=>'required|string',
        // ]);

        // $not_approved=User::where('id',$request->user_id)->first();
        // if($not_approved->is_approved==0){
        //     return back()->with("issue","The user has not been approved, contact the authorizer");
        // }

        // $share=new Share();

        // $share->user_id=$request->input('user_id');
        // $share->shares_amount=$request->input('shares_amount');
        // $share->share_type_id=$request->input('share_type_id');
      

        // $result=$share->save();

        // if($result){
        //     return back()->with("message","Shares allocated successfully,pending approval");
        // }
        
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
