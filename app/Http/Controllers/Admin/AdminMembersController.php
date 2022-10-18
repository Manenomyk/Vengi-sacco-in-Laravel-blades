<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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

   
   
}
