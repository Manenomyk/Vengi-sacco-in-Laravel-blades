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
        .ditails ul li b span{
            font-size: 15px;
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
                        <h1><b>Transaction Processing</b></h1>
                        @if (session()->has('message'))
                            <div class="success-here">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <div class="ditails">
                            <ul>
                                <li><b><span>Name:</span> </b> {{ $user->name }}</li>
                                <li><b><span>Location:</span></b> {{ $user->location }}</li>
                                {{-- <li><b><span>Gender:</span></b> {{ $user->gender }}</li> --}}
                                <li><b><span>Id Number:</span></b> {{ $user->id_number }}</li>
                                <li><b><span>Phone Number:</span></b> {{ $user->phone_number }}</li>
                                <li><b><span>Account Type:</span></b> {{ $details->account_type }}</li>
                                <li><b><span>interest:</span></b> {{ $details->interest }}</li>
                                <li><b><span>Duration:</span></b> {{ $details->duration }}</li>
                                <li><b><span>Account Type:</span></b> {{ $details->account_type }}</li>
                                <li><b><span>Account Number:</span></b> {{ $account->id }}</li>
                                <li><b><span>Account Balance:</span></b> {{ $account->amount_without_interest }}</li>

                            </ul>
                        </div>
                        <form action="{{ url('store-allocation') }}" method="POST" enctype="multipart/form-data"
                            style="display: flex;flex-direction:column; justify-content:center;">
                            @csrf

                            <label for="role">Type Of Transaction</label>
                            <select class="forminput" name="type" value="{{ old('type') }}">
                                <option value="">Select type</option>
                                <option value="0">debit</option>
                                <option value="1">credit</option>
                            </select>
                            @error('type')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <label for="amount">Amount</label>
                            <input class="forminput" type="text" name="amount" value="{{ old('amount') }}">
                            @error('amount')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <input type="hidden" name="member" value={{ $user->id }}>
                            <input type="hidden" name="account" value={{ $account->id }}>
                            <div style="display: flex; justify-content:right; ">
                                <button type="submit"
                                    style="background-color: #0A2558; color:white; padding:8px 0px; width:100px; border-radius:10px;">
                                    Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </section>
    @endsection

</body>

</html>
