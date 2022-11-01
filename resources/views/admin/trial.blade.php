<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('cssFiles/clerkmembers.css') }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .space-content {
            display: flex;
            justify-content: space-between;
        }
        .center-report{
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
            <div class="space-content">
                <div class="pdf" style="display: flex; flex-direction:row; ">
                    <form action="{{ url('view-trial-pdf') }}" method="post" enctype="multipart/form-data"
                        target="blank">
                        @csrf
                        <button type="submit"
                            style="margin-left: 10px; background-color: rgb(109, 207, 109); padding:8px 10px;"> view
                            pdf</button>
                    </form>
                </div>
            </div>
            <div class="center-report">
                <div class="container">
                    <h3 class="top-header"><b>Trial Balance Reports</b></h3>
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Asset Type</th>
                                    <th>Asset Value</th>
                                    <th>Liability Type</th>
                                    <th>Liability Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Normal Loans</td>
                                    <td>{{ $normal }}</td>
                                    <td>Shares Account</td>
                                    <td>{{ $share }}</td>
                                </tr>
                                <tr>
                                    <td>Emergency Loans</td>
                                    <td>{{ $emergency }}</td>
                                    <td> Institutional Shares</td>
                                    <td>{{ $inst_share }}</td>
                                </tr>
                                <tr>
                                    <td>Table Banking Loan</td>
                                    <td>{{ $table }}</td>
                                    <td>nill</td>
                                    <td>nill</td>
                                </tr>
                                @foreach ($general_ledgers as $item)
                                @if ($item->amount >= 0)
                                <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>nill</td>
                                <td>nill</td>
                            </tr>
                                @endif
                                @endforeach
                                @foreach ($general_ledgers as $item)
                                @if ($item->amount < 0)
                                <tr>
                               
                                <td>nill</td>
                                <td>nill</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->amount }}</td>
                            </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="div-table">
                        <div class="title">Trial Balance</div>
                        <div class="table">
                            <div class="tr">
                                <div class="td">Asset Type</div>
                                <div class="td">Asset Value</div>
                                <div class="td">Liability Type</div>
                                <div class="td">Liability Value</div>
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
                                <div class="td">null</div>
                                <div class="td">null</div>
                            </div>
                           
                                @foreach ($general_ledgers as $item)
                                <div class="tr">
                                @if ($item->amount >= 0)
                              
                                    <div class="td"> {{ $item->name }}</div>
                                    <div class="td"> {{ $item->amount }}</div> 
                              
                                @endif
                                @if ($item->amount < 0)
                               
                                    <div class="td"> {{ $item->name }}</div>
                                    <div class="td"> {{ $item->amount }}</div> 
                                
                                @endif
                            </div>
                                @endforeach
                           

                           
                            <div class="tr">
                                <div class="td">Total</div>
                                <div class="td">{{ $loans_sum }}</div>
                                <div class="td">Total</div>
                                <div class="td">{{ $shares_sum }}</div>
                            </div>
                        </div> --}}
                    </div>
    
           


        </div>
    </section>

</body>

</html>
