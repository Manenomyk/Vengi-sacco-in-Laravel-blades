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
              <a href="{{ url('clerk-dash') }}" class="{{ request()->is('clerk-dash') ? 'active' : '' }}">
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="{{ url('get-account-types') }}"  class="{{ request()->is('get-account-types') ? 'active' : '' }}">
                <i class='bx bx-box' ></i>
                <span class="links_name">Account types</span>
              </a>
            </li>
            <li>
              <a href="{{ url('get-emergency') }}"  class="{{ request()->is('get-emergency') ? 'active' : '' }}">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name"> Emergency loans</span>
              </a>
            </li>
            <li>
              <a href="{{ url('table-banking') }}"  class="{{ request()->is('table-banking') ? 'active' : '' }}">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name"> Table Banking loans</span>
              </a>
            </li>
            <li>
              <a href="{{ url('share-account') }}"  class="{{ request()->is('share-account') ? 'active' : '' }}">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name"> Shares account</span>
              </a>
            </li>
            <li>
              <a href="{{ url('normal-share') }}"  class="{{ request()->is('normal-share') ? 'active' : '' }}">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name"> Normal loans</span>
              </a>
            </li>
            <li>
              <a href="{{ url('inst-shares') }}"  class="{{ request()->is('inst-shares') ? 'active' : '' }}">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name"> Institutional Shares</span>
              </a>
            </li>
            <li>
              <a href="{{ url('gen-ledger') }}"  class="{{ request()->is('gen-ledger') ? 'active' : '' }}">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name"> General Ledger</span>
              </a>
            </li>
            <li>
              <a href="{{ url('members') }}"  class="{{ request()->is('members') ? 'active' : '' }}">
                <i class='bx bx-coin-stack' ></i>
                <span class="links_name">Members</span>
              </a>
            </li>
            <li>
              <a href="{{ url('account-number') }}"  class="{{ request()->is('account-number') ? 'active' : '' }}">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Transaction Processing</span>
              </a>
            </li>
          
          </ul>
      </div>
    @yield('clerk-sidebar')   
    
    </body>
    </html>


  