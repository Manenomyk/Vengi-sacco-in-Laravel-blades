<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}" >
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   
    <body>
        @include('layouts.nav')
        @section('navigation')

    @include('layouts.member-sidebar')

     @section('member-sidebar')

     @endsection

      
      <section class="home-section">
        <div class="home-content">
          <div class="overview-boxes">
            <div class="box" style="background-color: rgb(139, 158, 177);">
              <div class="right-side">
                <div class="box-topic">Total Shares</div>
                <div class="number">{{ $shares }}</div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up now</span>
                </div>
              </div>
              
            </div>
            <div class="box" style="background-color: dodgerblue;">
              <div class="right-side">
                <div class="box-topic">Total Institutional Shares</div>
                <div class="number">{{ $inst_share }}</div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up now</span>
                </div>
              </div>
            </div>
            <div class="box" style="background-color: rgb(98, 162, 145);">
              <div class="right-side">
                <div class="box-topic">Total Normal loans</div>
                <div class="number">{{ $normal }}</div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up now</span>
                </div>
              </div>
            </div>
            <div class="box" style="background-color: rgb(167, 146, 169);">
              <div class="right-side">
                <div class="box-topic">Total Emergency loans</div>
                <div class="number">{{ $emergency }}</div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up Now</span>
                </div>
              </div>
            </div>
          </div>
    
          <div class="sales-boxes">
            <div class="recent-sales box">
              <div class="title">Summary content</div>
              <div class="sales-details">
               
              </div>
              
            </div>
            <div class="top-sales box">
              <div class="title">Pending Display</div>

            </div>
          </div>
        </div>
      </section>
    
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
