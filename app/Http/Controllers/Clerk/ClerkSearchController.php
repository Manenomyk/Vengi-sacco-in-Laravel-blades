<?php

namespace App\Http\Controllers\Clerk;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClerkSearchController extends Controller
{
    public function members(Request $request){
        $validated=$request->validate([
            'name'=>'string'
        ]);

        // dd($request->all());

        $member=User::where('role',3)
        ->where('is_approved',1)
        ->where('name','LIKE','%'.$request->name.'%')
        ->paginate(10);

        dd($member);

        return view('clerk.clerk-members',compact('member'));
    }
}
