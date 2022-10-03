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
                        <h1><b>Add loan</b></h1>
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
                        <form action="{{ url('store-loans') }}" method="POST" enctype="multipart/form-data"
                            style="display: flex;flex-direction:column; justify-content:center;">
                            @csrf

                            <label for="user">Select user to allocate loan</label>
                            <select class="forminput" name="user_id">
                                <option value="">Select user</option>
                                @foreach ($member as $item)
                                    <option value={{ $item->id }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <label for="amount">Amount of loan</label>
                            <input class="forminput" type="text" name="loan_amount">
                            @error('loan_amount')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <label for="loans_type_id">select type of loan</label>
                            <select class="forminput" name="loans_type_id">
                                <option value="">Select type</option>
                                @foreach ($type as $loan)
                                    <option value={{ $loan->id }}>{{ $loan->name }}</option>
                                @endforeach
                            </select>
                            @error('loans_type_id')
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
