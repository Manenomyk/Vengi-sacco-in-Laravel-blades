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
            <h1><b>Add shares</b></h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="color: red">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{ url('store-shares') }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column; justify-content:center;">
            @csrf
           
            <label for="user">Select user to allocate shares</label>
            <select class="forminput" name="user_id" >
                  <option value="">Select user</option>
                  @foreach ($member as $item)
                  <option value={{ $item->id }}>{{ $item->name }}</option>
                  @endforeach
            </select>
            <label for="amount">Amount of shares</label>
            <input class="forminput" type="text" name="shares_amount">

            <label for="type">select type of share</label>
            <select class="forminput" name="share_type_id" >
                  <option value="">Select type</option>
                  @foreach ($type as $share)
                  <option value={{ $share->id }}>{{ $share->name }}</option>
                  @endforeach
                  
            </select>

            <div style="display: flex; justify-content:right; ">
              <button type="submit" style="background-color: #0A2558; color:white; padding:8px 0px; width:100px; border-radius:10px;" >Add Shares</button>
            </div>
            </form>
              
         </div>
        </div>
      </div>
      
      
   </section>
   @endsection

    </body>
    </html>
