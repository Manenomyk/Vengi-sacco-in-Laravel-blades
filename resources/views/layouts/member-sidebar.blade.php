<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}" >
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
    <body>
      <div class="sidebar">
        <div class="logo-details">
          <span class="logo_name">Welcome, Member</span>
        </div>
          <ul class="nav-links">
            <li>
              <a href="{{ url('member-dashboard') }}" class="active">
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="{{ url('member-emergency') }}">
                <i class='bx bx-box' ></i>
                <span class="links_name">My emergency loans</span>
              </a>
            </li>
            <li>
              <a href="{{ url('member-table-banking') }}">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name">My table banking loans</span>
              </a>
            </li>
            <li>
              <a href="{{ url('member-share-account') }}">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name">My shares account</span>
              </a>
            </li>
            <li>
              <a href="{{ url('member-normal-share') }}">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name">My normal loans</span>
              </a>
            </li>
            <li>
              <a href="{{ url('member-inst-shares') }}">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name">My institutional loans</span>
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

     

      @yield('member-sidebar')
    
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


  