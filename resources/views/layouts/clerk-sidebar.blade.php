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
          <span class="logo_name">Welcome, clerk</span>
        </div>
          <ul class="nav-links">
            <li>
              <a href="{{ url('clerk-dash') }}" class="active">
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="{{ url('clerk-shares') }}">
                <i class='bx bx-box' ></i>
                <span class="links_name">Shares</span>
              </a>
            </li>
            <li>
              <a href="{{ url('clerk-loans') }}">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name"> Loans</span>
              </a>
            </li>
            <li>
              <a href="{{ url('members') }}">
                <i class='bx bx-coin-stack' ></i>
                <span class="links_name">Members</span>
              </a>
            </li>
            <li>
              <a href="{{ url('account-number') }}">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Transact</span>
              </a>
            </li>
            <li>
              <a href="{{ url('add-member') }}">
                <i class='bx bx-book-alt' ></i>
                <span class="links_name">Add member</span>
              </a>
            </li>
            <li>
              <a href="{{ url('add-account-type') }}">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Add account type</span>
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

     

      @yield('clerk-sidebar')
    
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


  