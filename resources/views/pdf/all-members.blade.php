<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members</title>
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
        <h3 class="top-header"><b>Sacco members</b></h3>
        {{-- <div class="button">
          <div class="btn"> <a href="{{ url('clerk-add-members') }}">+ Add members</a></div>
        </div> --}}
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Id number</th>
                        <th>Location</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($member as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->id_number }}</td>
                    <td>{{ $item->location }}</td>
                    <td>
                       {{ $item->gender }}
                    </td>
                </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>