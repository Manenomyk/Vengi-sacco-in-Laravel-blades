<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>loans</title>
    <style>
        * {
            font-family: 'Nunito', sans-serif;
        }

        .table {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .top-header {
            text-align: center;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 95%;

        }

        .our-logo{
            width: 60px;
            height: 80px;
            background-color: rgb(86, 75, 75);
            color: wheat;
            position: absolute;
           left: 20px;
        }
        h4{
            position: absolute;
            left: 250px;
        }
     
        header{
            width: 95%;
            height: 80px;
            position: relative;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        thead {
            background-color: #0a2558;
            color: white;
            font-size: 12px;
        }

        tbody {
            font-size: 10px;
        }
    </style>
</head>
<body>
    <header>
        <div class="our-logo" >
           <span>logo</span>
        </div>
        <h4>Vengi Sacco Official Documents</h4>
    </header>
    <div class="container" >
        <h3 class="top-header"><b>Loans allocated</b></h3>
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>loan amount (+ 5% interest)</th>
                        <th>User allocated </th>
                        <th>loan type</th>
                        <th>due date</th>
                        <th>status</th>
                        
                    </tr>
                </thead>
                <tbody>
                  @foreach ($loan as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->loan_amount }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                      @if ($item->loans_type_id==1)
                      Table bank
                      @elseif ($item->loans_type_id==2)
                      Short term
                      @elseif ($item->loans_type_id==3)
                      Short bank
                      @endif
                    </td>
                    <td>{{ $item->due_date }}</td>
                    <td>
                      @if ( $item->is_approved ==0 )
                      Pending
                      @else
                        Approved
                      @endif
                    </td>
                </tr>
               
                  @endforeach
                </tbody>
            </table>
        </div>
        <div>
</body>
</html>