<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cssFiles/clerkmembers.css') }}" >
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}" >
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
          <div class="container" >
            <h3 class="top-header"><b>Pending Loans</b></h3>
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
                        <td>
                          <div class="button1">
                            <form action="{{ url('authorizer-approve-loans/'.$item->id) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type = "hidden" name = "approve" value = "1" />
                              <button class="btn2" type="submit" style="background-color: rgb(109, 207, 109);"> Approve loan</button>
                            </form>
                           </div>
                      </td>
                      <td>
                          <div class="button1">
                            <form action="{{ url('authorizer-approve-loans/'.$item->id) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type = "hidden" name = "approve" value = "0" />
                              <button class="btn1" type="submit" style="background-color: rgb(200, 79, 79);">Reject request</button>
                            </form>
                          </div>
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
