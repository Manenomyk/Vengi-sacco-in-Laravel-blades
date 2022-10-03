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
                        <h1><b>Add Member</b></h1>
                        @if (session()->has('message'))
                            <div class="success-here">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form action="{{ url('store-members') }}" method="POST" enctype="multipart/form-data"
                            style="display: flex;flex-direction:column; justify-content:center;">
                            @csrf
                            <label for="name">name</label>
                            <input class="forminput" type="text" name="name">
                            @error('name')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <label for="email">email</label>
                            <input class="forminput" type="text" name="email">
                            @error('email')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <label for="role"></label>
                            <select class="forminput" name="role">
                                <option value="">Select role</option>
                                <option value="0">Administrator</option>
                                <option value="1">Clerk</option>
                                <option value="2">Authorizer</option>
                                <option value="3">Member</option>
                            </select>
                            @error('role')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <label for="id_number">id number</label>
                            <input class="forminput" type="text" name="id_number">
                            @error('id_number')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <label for="location">location</label>
                            <input class="forminput" type="text" name="location">
                            @error('location')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <select class="forminput" name="gender">
                                <option value="">Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('gender')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <label for="phone_number">phone number</label>
                            <input class="forminput" type="text" name="phone_number">
                            @error('phone_number')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <div style="display: flex; justify-content:right; ">
                                <button type="submit"
                                    style="background-color: #0A2558; color:white; padding:8px 0px; width:100px; border-radius:10px;">Add
                                    Member</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </section>
    @endsection

</body>

</html>
