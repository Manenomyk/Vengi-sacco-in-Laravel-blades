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
        

 
    <x-app-layout>

    </x-app-layout>

     <section class="home-section">
      <a href="{{ url('clerk-members') }}" ><--</a>
      <div class="home-content" style="display: flex; justify-content:center;">
        <div class="addcontainer">
          <div class="adddetails">
            <h3>add loans</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="color: red">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
            <form action="{{ url('store-loans') }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column; justify-content:center;">
            @csrf
           
            <label for="user">Select user to allocate loan</label>
            <select class="forminput" name="user_id" >
                  <option value="">Select user</option>
                  @foreach ($member as $item)
                  <option value={{ $item->id }}>{{ $item->name }}</option>
                  @endforeach
            </select>
            <label for="amount">Amount of loan</label>
            <input class="forminput" type="text" name="loan_amount">

            <label for="loans_type_id">select type of loan</label>
            <select class="forminput" name="loans_type_id" >
                  <option value="">Select type</option>
                  @foreach ($type as $loan)
                  <option value={{ $loan->id }}>{{ $loan->name }}</option>
                  @endforeach
                  
            </select>
           

            <button type="submit" >Add loans</button>
            </form>
              
         </div>
        </div>
      </div>
      
      
   </section>

    </body>
    </html>
