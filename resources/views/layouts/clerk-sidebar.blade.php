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
              <a href="{{ url('clerk-dash') }}" class="sidebarBtn active">
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="{{ url('get-account-types') }}" class="sidebarBtn">
                <i class='bx bx-box' ></i>
                <span class="links_name">Account types</span>
              </a>
            </li>
            <li>
              <a href="{{ url('get-emergency') }}" class="sidebarBtn">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name"> Emergency</span>
              </a>
            </li>
            <li>
              <a href="{{ url('table-banking') }}" class="sidebarBtn">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name"> Table Banking</span>
              </a>
            </li>
            <li>
              <a href="{{ url('share-account') }}" class="sidebarBtn">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name"> Share account</span>
              </a>
            </li>
            <li>
              <a href="{{ url('normal-share') }}" class="sidebarBtn">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name"> Normal Shares</span>
              </a>
            </li>
            <li>
              <a href="{{ url('inst-shares') }}" class="sidebarBtn">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name"> Institutional Shares</span>
              </a>
            </li>
            <li>
              <a href="{{ url('gen-ledger') }}" class="sidebarBtn">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name"> General Ledger</span>
              </a>
            </li>
            <li>
              <a href="{{ url('members') }}" class="sidebarBtn">
                <i class='bx bx-coin-stack' ></i>
                <span class="links_name">Members</span>
              </a>
            </li>
            <li>
              <a href="{{ url('account-number') }}" class="sidebarBtn">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Transact</span>
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
    //    let sidebar = document.querySelectorAll(".sidebar");
    // let sidebarBtn = document.querySelector(".sidebarBtn");
    // sidebarBtn.onclick = function() {
    //   sidebar.classList.toggle("active");
    //   if(sidebar.classList.contains("active")){
    //   sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    // }else
    //   sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    // }

    let list=document.querySelectorAll('.sidebarBtn');
    for(let i=0; i<list.length; i++){
      list[i].onClick=function(){
        let j=0;
        while(j < list.length){
          list[j++].className='list';
        }
        list[i].className='list active'
      }
    }

     </script>
   
    
    </body>
    </html>


  