<?php

namespace App\Http\Controllers\Clerk;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClerkMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member=User::where('role',3)->get();
        return view('clerk.clerk-members',compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clerk.clerk-addmembers');
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
            'name'=>'required|alpha|max:50|min:4',
            'email'=>'required|email|string|unique:users,email|max:100|min:4',
            'role' => 'required',
            'location'=>'required|string|max:50',
            'gender'=>'required|string|max:10',
            'id_number'=>'required|unique:users,id_number|string',
            'phone_number'=>'required|string',
        ]);

        $member=new User();

        $member->password=Hash::make($request->id_number);
        $member->name=$request->input('name');
        $member->email=$request->input('email');
        $member->role=$request->input('role');
        $member->id_number=$request->input('id_number');
        $member->location=$request->input('location');
        $member->gender=$request->input('gender');
        $member->phone_number=$request->input('phone_number');

        $member->save();

       
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
