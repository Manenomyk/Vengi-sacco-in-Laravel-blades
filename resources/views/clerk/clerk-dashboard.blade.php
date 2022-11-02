<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}" >
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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

    @extends('layouts.clerk-sidebar')
    <x-app-layout>

    </x-app-layout>

     @section('clerk-sidebar')
    
      
      <section class="home-section">
        <div class="home-content">
          <div class="overview-boxes">
            <div class="box" style="background-color: rgb(175, 136, 99);">
              <div class="right-side">
                <div class="box-topic">Total Present Members</div>
                <div class="number">{{ $members }}</div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up Now</span>
                </div>
              </div>
            
            </div>
            <div class="box" style="background-color: rgb(154, 94, 125);">
              <div class="right-side">
                <div class="box-topic">Pending Shares Account</div>
                <div class="number">{{ $dis_share }}</div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up Now</span>
                </div>
              </div>
             
            </div>
            <div class="box" style="background-color: rgb(70, 127, 90);">
              <div class="right-side">
                <div class="box-topic">Pending Emergency Loans</div>
                <div class="number">{{ $dis_emergency }}</div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up Now</span>
                </div>
              </div>
            
            </div>
            <div class="box" style="background-color: rgb(38, 65, 91);">
              <div class="right-side">
                <div class="box-topic">Pending Normal Loans</div>
                <div class="number">{{ $dis_normal }}</div>
                <div class="indicator">
                  <i class='bx bx-up-arrow-alt'></i>
                  <span class="text">Up Now</span>
                </div>
              </div>
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
                    <div class="title">Pending Status</div>
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
      @endsection
    
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
