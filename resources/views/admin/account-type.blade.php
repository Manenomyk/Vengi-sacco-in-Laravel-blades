<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}" >
    <link rel="stylesheet" href="{{ asset('cssFiles/clerkmembers.css') }}" >
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
      .sach-form{
        display: flex;
        justify-content: flex-end;
        margin-right: 10px;
        height: 20px;
      }
      .space-content{
        display: flex;
        justify-content: space-between;
      }
     </style>
   </head>
   
    <body>       

    @extends('layouts.clerk-sidebar')
    <x-app-layout>

    </x-app-layout>

     @section('clerk-sidebar')

     <section class="home-section">
        <div class="home-content">
          <div class="space-content">
            <div class="pdf" style="display: flex; flex-direction:row; ">
              <form action="{{ url('view-loans-pdf') }}" method="post" enctype="multipart/form-data" target="blank">
                @csrf
                <button type="submit" style="margin-left: 10px; background-color: rgb(109, 207, 109); padding:8px 10px;"> view pdf</button>
              </form>
            
              <div class="button" style="margin-left: 10px;">
                <div class="btn"> <a href="{{ url('add-account-type') }}">+</a></div>
            </div>
            </div>
            <form action="{{ url('admin-members') }}" method="post" enctype="multipart/form-data" class="sach-form"> 
              @csrf
              <input type="text" name="name" placeholder="search loans..."/>
              <button type="submit" style="background-color: #0A2558; color:white" >search</button>
            </form>
          </div>
          <div class="container" >
            <h3 class="top-header"><b>Loans allocated</b></h3>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Account Type</th>
                            <th>Interest </th>
                            <th>Duration in Months</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($account_type as $item)
                      <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->account_type }}</td>
                        <td>{{ $item->interest }} %</td>
                        <td>
                         {{ $item->duration }}
                        </td>
                        <td>
                          @if ( $item->is_approved ==0 )
                          Pending
                          @else
                            Approved
                          @endif
                        </td>
                    </tr>
                   
                      @endforeach
                    </tbody>
                </table>
            </div>
            <div>
        </div>
     </section>
     @endsection
    </body>
    </html>
