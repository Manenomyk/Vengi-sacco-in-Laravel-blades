<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}" >
    <link rel="stylesheet" href="{{ asset('cssFiles/clerkmembers.css') }}" >
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   
    <body>
        

      @extends('layouts.clerk-sidebar')
    <x-app-layout>

    </x-app-layout>
    @section('clerk-sidebar')

     <section class="home-section">
      <div class="home-content" style="display: flex; justify-content:center;">
        <div class="addcontainer">
          <div class="adddetails">
            <h1><b>Add Member</b></h1>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul style="color: red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form action="{{ url('store-members') }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column; justify-content:center;">
            @csrf
            <label for="name">name</label>
            <input class="forminput" type="text" name="name">
            <label for="email">email</label>
            <input class="forminput" type="text" name="email">
            <label for="role"></label>
            <select class="forminput" name="role" >
                  <option value="">Select roles</option>
                  <option value="0">Administrator</option>
                  <option value="1">Clerk</option>
                  <option value="2">Authorizer</option>
                  <option value="3">Member</option>
            </select>
            <label for="id_number">id number</label>
            <input class="forminput" type="text" name="id_number">
            <label for="location">location</label>
            <input class="forminput" type="text" name="location">
            <label for="gender">gender</label>
            <select class="forminput" name="gender" >
                  <option value="">Select gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
            </select>
            <label for="phone_number">phone number</label>
            <input class="forminput" type="text" name="phone_number">
            <div style="display: flex; justify-content:right; ">
              <button type="submit" style="background-color: #0A2558; color:white; padding:8px 0px; width:100px; border-radius:10px;" >Add Member</button>
            </div>
            </form>
              
         </div>
        </div>
      </div>
      
      
   </section>
   @endsection

    </body>
    </html>
