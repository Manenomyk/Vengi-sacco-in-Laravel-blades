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
    <style>
      *{
          font-family: 'Nunito', sans-serif;
          font-size: 12px;
      }
          .table {
              display: table;
              width: 90%;
              border-collapse: collapse;
          }
  
          .table .tr {
              display: table-row;
              border: 1px solid #ddd;
          }
  
          .table .tr:first-child {
              font-weight: bold;
              border-bottom: 2px solid #ddd;
          }
  
          .table .tr:nth-child(even) {
              background-color: #F9F9F9;
          }
  
          .table .tr .td {
              display: table-cell;
              padding: 8px;
              border-left: 1px solid #ddd;
          }
  
          .table .tr .td:first-child {
              border-left: 0;
          }
  
          /* Not necessary for table styling */
          .div-table,
          .table-tag {
              float: left;
              margin: 2em;
          }
  
          .div-table .title,
          .table-tag .title {
              text-align: center;
              padding-bottom: 0.5em;
          }
          .center-report{
            width: 90%;
              display: flex;
              align-items: center;
              justify-content: center;
          }
       
      </style>
</head>

<body>
    @include('layouts.nav')
    @section('navigation')

        @include('layouts.admin-sidebar')

    @section('admin-sidebar')

    @endsection


    <section class="home-section">
      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Present Members</div>
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
              <div class="box-topic">Pending Shares Account</div>
              <div class="number">{{ $dis_share }}</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            <i class='bx bxs-cart-add cart two' ></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Pending Emergency Loans</div>
              <div class="number">{{ $dis_emergency }}</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            <i class='bx bx-cart cart three' ></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Pending Normal Loans</div>
              <div class="number">{{ $dis_normal }}</div>
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
           
            <div class="center-report">
              <div class="div-table">
                  <div class="title">Loans and shares summary Report</div>
                  <div class="table">
                      <div class="tr">
                          <div class="td">Loan Type</div>
                          <div class="td">Total</div>
                          <div class="td">Share Type</div>
                          <div class="td">Total</div>
                      </div>
                      <div class="tr">
                          <div class="td">Normal Loans</div>
                          <div class="td">{{ $normal }}</div>
                          <div class="td">Shares Account</div>
                          <div class="td">{{ $share }}</div>
                        
                      </div>
                      <div class="tr">
                          <div class="td">Emergency Loans</div>
                          <div class="td">{{ $emergency }}</div>
                          <div class="td">Institutional Shares</div>
                          <div class="td">{{ $inst_share }}</div>
                         
                      </div>
                      <div class="tr">
                          <div class="td">Table Banking Loans</div>
                          <div class="td">{{ $table }}</div>
                      </div>
                     
                  </div>
              </div>

          </div>
         
           
           
          </div>
          <div class="top-sales box">
            <div class="center-report">
              <div class="div-table">
                  <div class="title">Pending Reports</div>
                  <div class="table">
                      <div class="tr">
                          <div class="td">Pending Type</div>
                          <div class="td">Total</div>
                      </div>
                      <div class="tr">
                        <div class="td">Members</div>
                        <div class="td">{{ $dis_user }}</div>   
                    </div>
                      <div class="tr">
                          <div class="td">Emergency loans</div>
                          <div class="td">{{ $dis_emergency }}</div>   
                      </div>
                      <div class="tr">
                          <div class="td">Noraml Loans</div>
                          <div class="td">{{ $dis_normal }}</div>
                      </div>
                      <div class="tr">
                          <div class="td">Table Banking Loans</div>
                          <div class="td">{{ $dis_table }}</div>
                      </div>
                      <div class="tr">
                        <div class="td">Shares Account</div>
                        <div class="td">{{ $dis_share }}</div>
                    </div>
                    <div class="tr">
                      <div class="td">Institutional Loans</div>
                      <div class="td">{{ $dis_inst }}</div>
                  </div>
                     
                  </div>
              </div>

          </div>
          </div>
        </div>

      
        

      </div>
    </section>
</body>

</html>
