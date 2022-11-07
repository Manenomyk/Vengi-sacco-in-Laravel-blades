<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}" >
    <link rel="stylesheet" href="{{ asset('cssFiles/clerkmembers.css') }}" >
    <!-- Boxicons CDN Link -->
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
          <div class="pdf" style="display: flex; flex-direction:row; ">
            <form action="{{ url('view-members-pdf') }}" method="post" enctype="multipart/form-data" target="blank">
              @csrf
              <button type="submit" style="margin-left: 10px; background-color: rgb(109, 207, 109); padding:8px 10px;"> view pdf</button>
            </form>
          </div>
          <form action="{{ url('admin-members') }}" method="post" enctype="multipart/form-data" class="sach-form"> 
            @csrf
            <input type="text" name="name" placeholder="search users"/>
            <button type="submit" style="background-color: #0A2558; color:white" >search</button>
          </form>
        </div>
          <div class="container" >
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
                            <th>Approval status</th>
                            <th>Gender</th>
                            <th>User report</th>
                            <th>Remove Member</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($member as $item)
                      <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->id_number }}</td>
                        <td>{{ $item->location }}</td>
                        <td>
                          @if ($item->is_approved==1)
                          Approved
                          @elseif ($item->is_approved==0)
                          Pending
                        @endif
                        </td>
                        <td>{{ $item->gender }}</td>
                        <td>
                          <div class="button1">
                              <a href="{{ url('admin-member-report/'.$item->id) }}"><button class="btn2" type="submit" style="background-color: rgb(109, 207, 109);"> View Report</button></a>
                           </div>
                      </td>
                      <td>
                        <div class="button1">
                          <form action="{{ url('admin-member-remove/'.$item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button class="btn1" type="submit" style="background-color: rgb(200, 79, 79);" >Delete</button>
                          </form>
                        </div>
                    </td>
                    </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
            <div>
              {{ $member->onEachSide(3)->links() }}
        </div>
      </section>
    
    
    </body>
    </html>
