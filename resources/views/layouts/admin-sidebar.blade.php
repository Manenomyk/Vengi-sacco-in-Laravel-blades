<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>

</style>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <span class="logo_name">Welcome, Admin</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="{{ url('admin-dashboard') }}" class="{{ request()->is('admin-dashboard') ? 'active' : '' }}">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin-members') }}" class="{{ request()->is('admin-members') ? 'active' : '' }}" >
                    <i class='bx bx-box'></i>
                    <span class="links_name">All members</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin-emergency') }}" class="{{ request()->is('admin-emergency') ? 'active' : '' }}">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Emergency loans</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin-normal-share') }}"  class="{{ request()->is('admin-normal-share') ? 'active' : '' }}">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Normal loans</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin-table-banking') }}" class="{{ request()->is('admin-table-banking') ? 'active' : '' }}">
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Table banking loans</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin-share-account') }}" class="{{ request()->is('admin-share-account') ? 'active' : '' }}">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Shares accounts</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin-inst-shares') }}" class="{{ request()->is('admin-inst-shares') ? 'active' : '' }}">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Institutional Shares</span>
                </a>
            </li>
            <li>
                <a href="{{ url('get-logs') }}"  class="{{ request()->is('get-logs') ? 'active' : '' }}">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">View System Logs</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/reports/trial') }}" class="{{ request()->is('admin/reports/trial') ? 'active' : '' }}">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">trial Balance</span>
                </a>
            </li>
            <li>
                <a href="{{ url('all-reports') }}" class="{{ request()->is('all-reports') ? 'active' : '' }}">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Transation Reports</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/reports/page') }}"  class="{{ request()->is('admin/reports/page') ? 'active' : '' }}">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Generate Statements</span>
                </a>
            </li>
          
        </ul>
    </div>



    @yield('admin-sidebar')

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>

</body>

</html>
