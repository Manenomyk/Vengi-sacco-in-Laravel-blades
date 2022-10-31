<?php

namespace App\Http\Controllers\Clerk;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{

    public function index(){
        $member=User::where('role',3)->where('is_approved',1)->paginate(10);
        return view('clerk.clerk-members',compact('member'));
    }
    public function create(){
        return view('clerk.add-member');
    }

    public function store(Request $req){
        $validated=$req->validate([
            'name'=>'required|string',
            'email'=>'required|unique:users,email|email',
            'role'=>'required',
            'id_number'=>'required|numeric|digits_between:6,12|unique:users,id_number',
            'location'=>'required',
            'gender'=>'required',
            'phone_number'=>'required|numeric|digits_between:9,10|unique:users,phone_number'
        ]);

        $user= new User();

        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->role=$req->input('role');
        $user->id_number=$req->input('id_number');
        $user->location=$req->input('location');
        $user->gender=$req->input('gender');
        $user->phone_number=$req->input('phone_number');
        $user->password=Hash::make($req->id_number);

        $result=$user->save();

        if($result){
            Alert::success('Information', 'Member added created successfully');
            return back()->with("message","Member created successfully");
        }
        else{
            return back()->with("issue","Error adding member");
        }
    }
}
