<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('cssFiles/clerkmembers.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    @include('layouts.nav')
    @section('navigation')

        @include('layouts.admin-sidebar')

    @section('admin-sidebar')

    @endsection


    <section class="home-section">
        <div class="home-content">
            <div class="container">
                <h3 class="top-header"><b>System Logs</b></h3>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>subject model </th>
                                <th>Action</th>
                                <th>date done</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{  $item->subject_type}}</td>
                                    <td>{{ $item->event }}</td>

                                    <td>{{ $item->created_at->toDayDateTimeString() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $activity->onEachSide(2)->links() }}
                </div>
    </section>


</body>

</html>
