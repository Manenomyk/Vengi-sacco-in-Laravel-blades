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
    @extends('layouts.authorizer-sidebar')
    <x-app-layout>

    </x-app-layout>

    @section('authorizer-sidebar')
        <section class="home-section">
            <div class="home-content">
                <div class="space-content">
                    <div class="pdf" style="display: flex; flex-direction:row; ">
                        <form action="{{ url('view-members-pdf') }}" method="post" enctype="multipart/form-data"
                            target="blank">
                            @csrf
                            <button type="submit"
                                style="margin-left: 10px; background-color: rgb(109, 207, 109); padding:8px 10px;"> view
                                pdf</button>
                        </form>
                    </div>
                </div>
                <div class="container">
                    <h3 class="top-header"><b>General Ledgers</b></h3>
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Member</th>

                                    <th>amount</th>

                                    <th>Date Opened</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($general_ledgers as $item)
                                    <tr>
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
                                        @if ($item->is_approved == 0)
                                            <td>
                                                <div class="button1">
                                                    <form action="{{ url('auth-approve-ledger/' . $item->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="approve" value="1" />
                                                        <button class="btn2" type="submit"
                                                            style="background-color: rgb(109, 207, 109);">Approve</button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="button1">
                                                    <form action="{{ url('auth-approve-ledger/' . $item->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="approve" value="0" />
                                                        <button class="btn1" type="submit"
                                                            style="background-color: rgb(200, 79, 79);">Reject</button>
                                                    </form>
                                                </div>
                                            </td>
                                        @elseif ($item->is_approved == 1)
                                        @endif

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $general_ledgers->onEachSide(2)->links() }}
            </div>
        </section>
    @endsection
</body>

</html>
