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


    @include('layouts.nav')
    @section('navigation')

@include('layouts.admin-sidebar')

 @section('admin-sidebar')

 @endsection
        <section class="home-section">
            <div class="home-content" style="display: flex; justify-content:center;">
                <div class="addcontainer">
                    <div class="adddetails">
                        <h1><b>Generate reports</b></h1>
                        @if (session()->has('message'))
                            <div class="success-here">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form action="{{ url('admin/reports/page/generate') }}" method="POST" enctype="multipart/form-data"
                            style="display: flex;flex-direction:column; justify-content:center;">
                            @csrf

                            <label for="account_number">Account Number</label>
                            <input class="forminput" type="text" name="account_number" value="{{ old('account_number') }}">
                            @error('account_number')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <label for="start_date">Start Date</label>
                            <input class="forminput" type="date" name="start_date" value="{{ old('start_date') }}">
                            @error('start_date')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                            <label for="end_date">End Date</label>
                            <input class="forminput" type="date" name="end_date" value="{{ old('end_date') }}">
                            @error('end_date')
                                <div class="errors-here">{{ $message }}</div>
                            @enderror
                           
                            <div style="display: flex; justify-content:right; ">
                                <button type="submit"
                                    style="background-color: #0A2558; color:white; padding:8px 0px; width:100px; border-radius:10px;">
                                    Generate</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </section>
   

</body>

</html>
