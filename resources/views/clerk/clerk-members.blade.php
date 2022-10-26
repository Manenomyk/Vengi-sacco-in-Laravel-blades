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
        .open-account{
          background-color: rgb(109, 207, 109);
          border-radius: 8px;
          padding: 6px 10px;
        }
        .open-account:hover{
          transition: 1s;
          background-color: white;
          color: black;
          box-shadow: 11px 6px 6px rgb(109, 207, 109,0.6);
          transform:scale(1.05);
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
                        <form action="{{ url('view-members-pdf') }}" method="post" enctype="multipart/form-data"
                            target="blank">
                            @csrf
                            <button type="submit"
                                style="margin-left: 10px; background-color: rgb(109, 207, 109); " class="open-account"> view
                                pdf</button>
                        </form>
                        <div class="button" style="margin-left: 10px;">
                          <div class="btn open-account"> <a href="{{ url('add-member') }}">+</a></div>
                      </div>
                    </div>
                    {{-- <form action="{{ url('clerk/search/members') }}" method="post" enctype="multipart/form-data"
                        class="sach-form">
                        @csrf
                        <input type="text" name="member" placeholder="search members..." />
                        <button type="submit" style="background-color: #0A2558; color:white">search</button>
                    </form> --}}
                </div>
                <div class="container">
                    <h3 class="top-header"><b>Sacco members</b></h3>
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    {{-- <th>Id</th> --}}
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Id number</th>
                                    <th>Location</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($member as $item)
                                    <tr>
                                        {{-- <td>{{ $item->id }}</td> --}}
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->id_number }}</td>
                                        <td>{{ $item->location }}</td>
                                        <td>
                                            {{ $item->gender }}
                                        </td>
                                        <td><a href="{{ url('create-account/' . $item->id) }}" class="open-account" >Open New Account</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $member->onEachSide(2)->links() }}
            </div>
        </section>
    @endsection
</body>

</html>
