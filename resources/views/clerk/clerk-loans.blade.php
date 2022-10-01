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
        {{-- @include('layouts.nav')
        @section('navigation') --}}

       

    @extends('layouts.clerk-sidebar')
    <x-app-layout>

    </x-app-layout>

     @section('clerk-sidebar')

     

     <section class="home-section">
        <div class="home-content">
          <div class="container" >
            <h3 class="top-header"><b>Loans allocated</b></h3>
            {{-- <div class="button">
              <div class="btn"> <a href="{{ url('clerk-add-members') }}">+ Add members</a></div>
            </div> --}}
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>loan amount</th>
                            <th>User allocated </th>
                            <th>loan type</th>
                            <th>due date</th>
                            <th>status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($loan as $item)
                      <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->loan_amount }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                          @if ($item->loans_type_id==1)
                          Table bank
                          @elseif ($item->loans_type_id==2)
                          Short term
                          @elseif ($item->loans_type_id==3)
                          Short bank
                          @endif
                        </td>
                        <td>{{ $item->due_date }}</td>
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
