<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('cssFiles/clerkmembers.css') }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    @include('layouts.nav')
    @section('navigation')

        @include('layouts.authorizer-sidebar')

    @section('authorizer-sidebar')

    @endsection


    <section class="home-section">
        <div class="home-content">
            <div class="container">
                <h3 class="top-header"><b>Sacco Members Pending Approval</b></h3>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Id number</th>
                                <th>Location</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($member) == 0)
                                <tr >
                                  <td colspan="6" style="text-align: center"><b>Hey! No pending members at the moment</b>
                                  </td></tr>
                            @else
                                @foreach ($member as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->id_number }}</td>
                                        <td>{{ $item->location }}</td>
                                        <td>
                                            {{ $item->gender }}
                                        </td>
                                        <td>
                                            <div class="button1">
                                                <form action="{{ url('authorizer-approve-member/' . $item->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="approve" value="1" />
                                                    <button class="btn2" type="submit"
                                                        style="background-color: rgb(109, 207, 109);"> Approve
                                                        Member</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="button1">
                                                <form action="{{ url('authorizer-approve-member/' . $item->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="approve" value="0" />
                                                    <button class="btn1" type="submit"
                                                        style="background-color: rgb(200, 79, 79);">Reject
                                                        request</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $member->onEachSide(2)->links() }}
        </div>
    </section>



</body>

</html>
