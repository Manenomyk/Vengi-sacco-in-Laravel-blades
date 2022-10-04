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
            <h3 class="top-header"><b>User Logs</b></h3>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>description</th>
                            <th>subject model </th>
                            <th>event</th>
                            <th>subject user id</th>
                            <th>causer name</th>
                            <th>causer role</th>
                            <th>date done</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($activity as $item)
                      <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->subject_type }}</td>
                        <td>{{ $item->event }}</td>
                        <td>{{ $item->subject_id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                          @if ($item->role==0)
                            administrator
                          @elseif ($item->role==1)
                            clerk
                          @elseif ($item->role==2)
                            authorizer
                          @elseif ($item->role==3)
                            member
                          @endif
                        </td>
                        <td>{{ $item->created_at }}</td>
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
