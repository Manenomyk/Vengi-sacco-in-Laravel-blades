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
                        <h1><b>Account Opening</b></h1>
                        @if (session()->has("info"))
                            <div class="success-here">
                                {{ session()->get("info") }}
                            </div>
                        @endif
                        @if (session()->has('issue'))
                            <div class="errors-here">
                                {{ session()->get('issue') }}
                            </div>
                        @endif
                        <h1>Open Account for {{ $user->name }} </h1>
                        <div class="ditails">
                            <ul>
                                <li><b><span>Name:</span> </b> {{ $user->name }}</li>
                                <li><b><span>Role:</span></b> {{ $user->role }}</li>
                                <li><b><span>Location:</span></b> {{ $user->location }}</li>
                                <li><b><span>Gender:</span></b> {{ $user->gender }}</li>
                                <li><b><span>Id Number:</span></b> {{ $user->id_number }}</li>
                                <li><b><span>Phone Number:</span></b> {{ $user->phone_number }}</li>
                                <li><b><span>Email:</span></b> {{ $user->email }}</li>
                            </ul>
                        </div>

                        <form action="{{ url('store-opened-account') }}" method="POST" enctype="multipart/form-data"
                            style="display: flex;flex-direction:column; justify-content:center;">
                            @csrf
                            <select class="forminput" name="account_type">
                                <option value="">Select Account Type</option>
                                @foreach ($types as $item)
                                    <option value={{ $item->id }}>{{ $item->account_type }}</option>
                                @endforeach
                            </select>
                            @error('account_type')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <input type="hidden" name="user_id" value={{ $user->id }}>

                            <div style="display: flex; justify-content:right; ">
                                <button type="submit"
                                    style="background-color: #0A2558; color:white; padding:8px 0px; width:100px; border-radius:10px;">Open
                                    Account</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </section>
    @endsection

</body>

</html>
