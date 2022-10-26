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
        .sach-form {
            display: flex;
            justify-content: flex-end;
            margin-right: 10px;
        }

        .space-content {
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
                        <form action="" method="post" enctype="multipart/form-data"
                            target="blank">
                            @csrf
                            <button type="submit"
                                style="margin-left: 10px; background-color: rgb(109, 207, 109); padding:8px 10px;"> view
                                pdf</button>
                        </form>
                       
                        <div class="button" style="margin-left: 10px;">
                            <div class="btn open-account"> <a href="{{ url('create-ledger') }}">+</a></div>
                        </div>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data"
                        class="sach-form">
                        @csrf
                        <input type="text" name="name" placeholder="search users..." />
                        <button type="submit" style="background-color: #0A2558; color:white">search</button>
                    </form>
                </div>
                <div class="container">
                    <h3 class="top-header"><b>General Ledgers</b></h3>
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Account Number</th>
                                    <th>Name</th>
                                    <th>amount</th>
                                    <th>Date Opened</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Not available</td>
                                    <td>Shares Account</td>
                                    <td>{{ $share }}</td>
                                    <td>Not available</td>
                                    <td>Updated</td>
                                </tr>
                                <tr>
                                    <td>Not available</td>
                                    <td>Institutinal Share</td>
                                    <td>{{ $inst_share }}</td>
                                    <td>Not available</td>
                                    <td>Updated</td>
                                </tr>
                                <tr>
                                    <td>Not available</td>
                                    <td>Normal loans</td>
                                    <td>{{ $normal }}</td>
                                    <td>Not available</td>
                                    <td>Updated</td>
                                </tr>
                                <tr>
                                    <td>Not available</td>
                                    <td>Emergency loans</td>
                                    <td>{{ $emergency }}</td>
                                    <td>Not available</td>
                                    <td>Updated</td>
                                </tr>
                                <tr>
                                    <td>Not available</td>
                                    <td>Table banking loans</td>
                                    <td>{{ $table }}</td>
                                    <td>Not available</td>
                                    <td>Updated</td>
                                </tr>
                                <tr>
                                @foreach ($general_ledgers as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if ($item->amount == null)
                                                0
                                            @else
                                                {{ $item->amount }}
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            @if ($item->is_approved == 0)
                                                pending
                                            @elseif ($item->is_approved == 1)
                                                Approved
                                            @endif

                                        </td>
                                        <td>
                                          <a href="{{ url('fund-ledger/'.$item->id) }}"> Allocate Amount</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endsection
</body>

</html>
