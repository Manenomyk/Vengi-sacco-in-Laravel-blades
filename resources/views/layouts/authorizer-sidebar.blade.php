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
          <span class="logo_name">Welcome, Authorizer</span>
        </div>
          <ul class="nav-links">
            <li>
              <a href="{{ url('authorizer-dashboard') }}" class="{{ request()->is('authorizer-dashboard') ? 'active' : '' }}">
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="{{ url('authorizer-members') }}" class="{{ request()->is('authorizer-members') ? 'active' : '' }}">
                <i class='bx bx-box' ></i>
                <span class="links_name">All members</span>
              </a>
            </li>
            <li>
              <a href="{{ url('authorizer-unapproved-members') }}" class="{{ request()->is('authorizer-unapproved-members') ? 'active' : '' }}">
                <i class='bx bx-list-ul' ></i>
                <span class="links_name">Pending Members</span>
              </a>
            </li>
            <li>
              <a href="{{ url('auth-emergency') }}" class="{{ request()->is('auth-emergency') ? 'active' : '' }}">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Emergency loans</span>
              </a>
            </li>
            <li>
              <a href="{{ url('auth-table-banking') }}" class="{{ request()->is('auth-table-banking') ? 'active' : '' }}">
                <i class='bx bx-coin-stack' ></i>
                <span class="links_name">Table banking loans</span>
              </a>
            </li>
            <li>
              <a href="{{ url('auth-share-account') }}" class="{{ request()->is('auth-share-account') ? 'active' : '' }}">
                <i class='bx bx-book-alt' ></i>
                <span class="links_name">Shares Accounts</span>
              </a>
            </li>
            <li>
              <a href="{{ url('auth-normal-share') }}" class="{{ request()->is('auth-normal-share') ? 'active' : '' }}">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Normal loans</span>
              </a>
            </li>
            <li>
              <a href="{{ url('auth-inst-shares') }}" class="{{ request()->is('auth-inst-shares') ? 'active' : '' }}">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Institutional Shares</span>
              </a>
            </li>
            <li>
              <a href="{{ url('auth-gen-ledger') }}" class="{{ request()->is('auth-gen-ledger') ? 'active' : '' }}">
                <i class='bx bx-cog' ></i>
                <span class="links_name">General Ledger</span>
              </a>
            </li>
          </ul>
      </div>

     

      @yield('authorizer-sidebar')
    </body>
    </html>


  