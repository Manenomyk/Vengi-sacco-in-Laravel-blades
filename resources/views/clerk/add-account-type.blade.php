<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('cssFiles/clerkmembers.css') }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      .errors-here {
          color: red;
      }

      .success-here {
          color: green;
      }
  </style>
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
                        <h1><b>Add Account Type</b></h1>
                        @if (session()->has('message'))
                            <div class="success-here">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        @if (session()->has('issue'))
                            <div class="errors-here">
                                {{ session()->get('issue') }}
                            </div>
                        @endif
                        <form action="{{ url('store-account-type') }}" method="POST" enctype="multipart/form-data"
                            style="display: flex;flex-direction:column; justify-content:center;">
                            @csrf

                            <label for="amount">Account Type Name</label>
                            <input class="forminput" type="text" name="account_type_name" value="{{ old('account_type_name') }}">
                            @error('account_type_name')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <label for="amount">Interest Rate</label>
                            <input class="forminput" type="text" name="interest_rate" value="{{ old('interest_rate') }}">
                            @error('interest_rate')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <label for="amount">Duration</label>
                            <input class="forminput" type="text" name="duration" value="{{ old('duration') }}">
                            @error('duration')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                           
                            <div style="display: flex; justify-content:right; ">
                                <button type="submit"
                                    style="background-color: #0A2558; color:white; padding:8px 0px; width:100px; border-radius:10px;">Add
                                    loans</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </section>
    @endsection

</body>

</html>
