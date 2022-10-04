<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
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
              <form action="{{ url('view-loans-pdf') }}" method="post" enctype="multipart/form-data" target="blank">
                @csrf
                <button type="submit" style="margin-left: 10px; background-color: rgb(109, 207, 109); padding:8px 10px;"> view pdf</button>
              </form>
              <form action="{{ url('download-loans-pdf') }}" method="post" enctype="multipart/form-data" target="blank">
                @csrf
                <button type="submit" style="margin-left: 10px; background-color: rgb(109, 207, 109); padding:8px 10px;" > download pdf</button>
              </form>
            </div>
            <form action="{{ url('admin-members') }}" method="post" enctype="multipart/form-data" class="sach-form"> 
              @csrf
              <input type="text" name="name" placeholder="search users"/>
              <button type="submit" style="background-color: #0A2558; color:white" >search</button>
            </form>
          </div>
          <div class="container" >
            <h3 class="top-header"><b>Loans allocated</b></h3>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>loan amount</th>
                            <th>User allocated </th>
                            <th>loan type</th>
                            <th>due date</th>
                            <th>status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($loan as $item)
                      <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->loan_amount }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                          @if ($item->loans_type_id==1)
                          Table bank
                          @elseif ($item->loans_type_id==2)
                          Short term
                          @elseif ($item->loans_type_id==3)
                          Short bank
                          @endif
                        </td>
                        <td>{{ $item->due_date }}</td>
                        <td>
                          @if ( $item->is_approved ==0 )
                          Pending
                          @else
                            Approved
                          @endif
                        </td>
                    </tr>
                   
                      @endforeach
                    </tbody>
                </table>
            </div>
            <div>
              {{ $loan->onEachSide(2)->links() }}
        </div>
      </section>
    
    
    </body>
    </html>
