<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}" >
    <link rel="stylesheet" href="{{ asset('cssFiles/clerkmembers.css') }}" >
    <!-- Boxicons CDN Link -->
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
          <div class="container" >
            <h3 class="top-header"><b>Pending Shares for Approval</b></h3>
            {{-- <div class="button">
              <div class="btn"> <a href="{{ url('clerk-add-members') }}">+ Add members</a></div>
            </div> --}}
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>share amount</th>
                            <th>User allocated </th>
                            <th>share type</th>
                            <th>status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($share as $item)
                      <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->shares_amount }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                          @if ($item->share_type_id==1)
                            Institution
                            @elseif ($item->share_type_id==2)
                            Bank
                          @endif
                       
                        </td>
                        <td>
                          @if ($item->is_approved==0)
                            Pending
                            @elseif ($item->is_approved==1)
                            Approved
                          @endif
                        </td>
                    </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
            <div>
        </div>
      </section>
    
    
    </body>
    </html>
