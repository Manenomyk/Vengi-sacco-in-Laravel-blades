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
        // $member=User::where('role',3)->paginate(10);
        return view('authorizer.authorizer-members');
    }

    public function unapproved_members(){
        // $member=User::where('role',3)->where('is_approved',0)->paginate(6);
        return view('authorizer.authorizer-memberspending');
    }

    public function approve(Request $request, $id){
        
        // $approve=User::find($id);

        // if($request->approve==1){
        //     $approve->is_approved="1";
        //     $result=$approve->update();
        //     if($result){
        //         return back()->with("message", "The member has been approved successfully");
        //     }
        // }

        // else{
        //     $result=$approve->delete();
        //     if($result){
        //         return back()->with("message", "The member has been declined successfully");
        //     }
        // }

       
       
    }

   
}
