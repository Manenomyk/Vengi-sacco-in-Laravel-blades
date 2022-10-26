<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}">
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
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin-members') }}">
                    <i class='bx bx-box'></i>
                    <span class="links_name">All members</span>
                </a>
            </li>
            <li class="{{ request()->is('technician/details*') ? 'active' : '' }}">
                <a href="{{ url('admin-emergency') }}">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Emergency loans</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin-normal-share') }}">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Normal loans</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin-table-banking') }}">
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Table banking loans</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin-share-account') }}">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Shares accounts</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin-inst-shares') }}">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Institutional Shares</span>
                </a>
            </li>
            <li>
                <a href="{{ url('get-logs') }}">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">View User Logs</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/reports/trial') }}">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">trial Balance</span>
                </a>
            </li>
            <li>
                <a href="{{ url('sample-report') }}">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Reports</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/reports/page') }}">
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
