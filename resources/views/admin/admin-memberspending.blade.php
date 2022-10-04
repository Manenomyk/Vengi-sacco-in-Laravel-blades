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
            <h3 class="top-header"><b>Sacco Members Pending for Approval</b></h3>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
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
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->id_number }}</td>
                        <td>{{ $item->location }}</td>
                        <td>
                           {{ $item->gender }}
                        </td>
                    </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
            <div>
              {{ $member->onEachSide(2)->links() }}
        </div>
      </section>
    
    
    </body>
    </html>
