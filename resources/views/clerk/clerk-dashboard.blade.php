<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}" >
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
   </head>
   
    <body>
        {{-- @include('layouts.nav')
        @section('navigation')
        @endsection --}}

    @extends('layouts.clerk-sidebar')
    <x-app-layout>

    </x-app-layout>

     @section('clerk-sidebar')
    
      
      <section class="home-section">
        <div class="home-content">
          <div class="overview-boxes">
            <div class="box">
              <div class="right-side">
                <div class="box-topic">Total Members</div>
                <div class="number">{{ $members }}</div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up from yesterday</span>
                </div>
              </div>
              <i class='bx bx-cart-alt cart'></i>
            </div>
            <div class="box">
              <div class="right-side">
                <div class="box-topic">Total Shares</div>
                <div class="number">{{ $shares }}</div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up from yesterday</span>
                </div>
              </div>
              <i class='bx bxs-cart-add cart two' ></i>
            </div>
            <div class="box">
              <div class="right-side">
                <div class="box-topic">Total Loans</div>
                <div class="number">{{ $loans }}</div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up from yesterday</span>
                </div>
              </div>
              <i class='bx bx-cart cart three' ></i>
            </div>
            <div class="box">
              <div class="right-side">
                <div class="box-topic">Pending Approvals</div>
                <div class="number">{{ $dis_total }}</div>
                <div class="indicator">
                  <i class='bx bx-down-arrow-alt down'></i>
                  <span class="text">Down From Today</span>
                </div>
              </div>
              <i class='bx bxs-cart-download cart four' ></i>
            </div>
          </div>
    
          <div class="sales-boxes">
            <div class="recent-sales box">
              <div class="title">Summary</div>
              <div class="disp-ledger" >
                <span>Account</span>  -----------------------------------------------------------  <span>Total</span>
              </div>
              <div class="disp-ledger">
                <span>Table Banking Loans</span>  ---------------------------------------------------  <span>{{ $table }}</span>
              </div>
              <div class="disp-ledger">
                <span>Normal loans</span>  ---------------------------------------------------  <span>{{ $normal }}</span>
              </div>
              <div class="disp-ledger">
                <span>Emergency loans</span>  ---------------------------------------------------  <span>{{ $emergency }}</span>
              </div>
              <div class="disp-ledger">
                <span>Shares Account</span>  ---------------------------------------------------  <span>{{ $share }}</span>
              </div>
              <div class="disp-ledger">
                <span>Institutional Shares</span>  ---------------------------------------------------  <span>{{ $inst_share }}</span>
              </div>
             
            </div>
            <div class="top-sales box">
              <div class="title">Doughnuts</div>

            </div>
          </div>
        </div>
      </section>
      @endsection
    
      <script>
       let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if(sidebar.classList.contains("active")){
      sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
      sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
     </script>
    
    </body>
    </html>
