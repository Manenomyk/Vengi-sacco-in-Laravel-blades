<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('cssFiles/clerkmembers.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      .sach-form{
        display: flex;
        justify-content: flex-end;
        margin-right: 10px;
      }
      .space-content{
        display: flex;
        justify-content: space-between;
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
            <div class="home-content">
                <div class="space-content">
                </div>
                <div class="container">
                    <h3 class="top-header"><b>Archive</b></h3>
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th> Id Number</th>
                                    <th>Phone Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                        {{ $item->email }}
                                      </td>
                                        <td>
                                        {{ $item->id_number }}
                                        </td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>
                                          <div class="button1">
                                              <a href="{{ url('admin/member/archive/restore/'.$item->id) }}"><button class="btn2" type="submit" style="background-color: rgb(109, 207, 109);">Restore User</button></a>
                                           </div>
                                      </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $user->onEachSide(2)->links() }}
            </div>
        </section>
    
</body>

</html>
