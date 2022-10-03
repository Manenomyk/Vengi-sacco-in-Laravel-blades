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
   </head>

   
    <body>
      <div class="sidebar">
        <div class="logo-details">
          <span class="logo_name">Welcome, Admin</span>
        </div>
          <ul class="nav-links">
            <li>
              <a href="{{ url('admin-dashboard') }}" class="active">
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="{{ url('admin-members') }}">
                <i class='bx bx-box' ></i>
                <span class="links_name">All members</span>
              </a>
            </li>
            <li>
              <a href="{{ url('admin-unapproved-members') }}">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name">Unapproved members</span>
              </a>
            </li>
            <li>
              <a href="{{ url('admin-shares') }}">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">All shares</span>
              </a>
            </li>
            <li>
              <a href="{{ url('admin-unapproved-shares') }}">
                <i class='bx bx-coin-stack' ></i>
                <span class="links_name">Unapproved shares</span>
              </a>
            </li>
            <li>
              <a href="{{ url('admin-loans') }}">
                <i class='bx bx-book-alt' ></i>
                <span class="links_name">All loans</span>
              </a>
            </li>
            <li>
              <a href="{{ url('admin-unapproved-loans') }}">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Unapproved loans</span>
              </a>
            </li>
            <li class="log_out">
              <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <x-jet-dropdown-link href="{{ route('logout') }}"
                         @click.prevent="$root.submit();" style="color: white">
                         <i class='bx bx-log-out'></i>
                    {{ __('Log Out') }}
                </x-jet-dropdown-link>
            </form>
          </li>
          </ul>
      </div>

     

      @yield('admin-sidebar')
    
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


  