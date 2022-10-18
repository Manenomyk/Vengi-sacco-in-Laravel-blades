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

  @extends('layouts.authorizer-sidebar')
  <x-app-layout>

  </x-app-layout>

  @section('authorizer-sidebar')
        <section class="home-section">
            <div class="home-content">
                <div class="space-content">
                  <div class="pdf" style="display: flex; flex-direction:row; ">
                    <form action="{{ url('view-members-pdf') }}" method="post" enctype="multipart/form-data" target="blank">
                      @csrf
                      <button type="submit" style="margin-left: 10px; background-color: rgb(109, 207, 109); padding:8px 10px;"> view pdf</button>
                    </form>
                    <form action="{{ url('download-members-pdf') }}" method="post" enctype="multipart/form-data" target="blank">
                      @csrf
                      <button type="submit" style="margin-left: 10px; background-color: rgb(109, 207, 109); padding:8px 10px;" > download pdf</button>
                    </form>
                  </div>
                  <form action="{{ url('admin-members') }}" method="post" enctype="multipart/form-data" class="sach-form"> 
                    @csrf
                    <input type="text" name="name" placeholder="search users..."/>
                    <button type="submit" style="background-color: #0A2558; color:white" >search</button>
                  </form>
                </div>
                <div class="container">
                    <h3 class="top-header"><b>Share Accounts</b></h3>
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Member</th>
                                    <th>Id Number</th>
                                    <th>Account Type</th>
                                    <th>Interest</th>
                                    <th>Duration</th>
                                    <th>amount</th>
                                    <th>Date Opened</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($share_accounts as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->id_number }}</td>
                                        <td>{{ $item->account_type }}</td>
                                        <td>{{ $item->interest }}</td>
                                        <td>{{ $item->duration }}</td>
                                        <td>
                                          @if ($item->amount_without_interest==null)
                                          0
                                          @else
                                          {{ $item->amount_without_interest }}
                                        @endif
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                          @if ($item->is_approved==0)
                                          pending
                                          @elseif ($item->is_approved==1)
                                          Approved
                                        @endif
                                        </td>
                                        @if ($item->is_approved==0)
                                        <td>
                                          <div class="button1">
                                            <form action="{{ url('auth-approve-share/'.$item->id) }}" method="POST" enctype="multipart/form-data">
                                              @csrf
                                              <input type = "hidden" name = "approve" value = "1" />
                                              <button class="btn2" type="submit" style="background-color: rgb(109, 207, 109);">Approve</button>
                                            </form>
                                           </div>
                                      </td>
                                      <td>
                                          <div class="button1">
                                            <form action="{{ url('auth-approve-share/'.$item->id) }}" method="POST" enctype="multipart/form-data">
                                              @csrf
                                              <input type = "hidden" name = "approve" value = "0" />
                                              <button class="btn1" type="submit" style="background-color: rgb(200, 79, 79);" >Reject</button>
                                            </form>
                                          </div>
                                      </td>
                                        @elseif ($item->is_approved==1)
                                        
                                      @endif
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $share_accounts->onEachSide(2)->links() }}
            </div>
        </section>
    @endsection
</body>

</html>
