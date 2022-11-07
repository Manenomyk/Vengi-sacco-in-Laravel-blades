<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('cssFiles/style.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .space-content {
            display: flex;
            justify-content: space-between;
        }

        .table {
            display: table;
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
            margin: 2em;
        }

        .div-table .title,
        .table-tag .title {
            text-align: center;
            padding-bottom: 0.5em;
        }

        .style-legder {
            display: flex;
        }

        .td-ledger {
            border: 1px solid #ddd;
            height: auto;
        }

        .center-report {
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
                <div class="div-table">
                    <div class="title">Trial Balance</div>
                    <div class="table">
                        <div class="tr">
                            <div class="td"></div>
                            <div class="td"></div>
                            <div class="td">Account Balance</div>
                        </div>
                        <div class="tr">
                            <div class="td"><b>Account Number</b></div>
                            <div class="td"><b>Account Name</b></div>
                            <div class="td"><b>Debits</b></div>
                            <div class="td"><b>Credits</b></div>
                        </div>
                        <div class="tr">
                            <div class="td">Not available</div>
                            <div class="td">Normal Loans</div>
                            <div class="td">_</div>
                            <div class="td">{{ $normal }}</div>
                        </div>
                        <div class="tr">
                            <div class="td">Not available</div>
                            <div class="td">Shares Account</div>
                            <div class="td">{{ $share }}</div>
                            <div class="td">_</div>
                        </div>
                        <div class="tr">
                            <div class="td">Not available</div>
                            <div class="td">Emergency Loans</div>
                            <div class="td">_</div>
                            <div class="td">{{ $emergency }}</div>
                        </div>
                        <div class="tr">
                            <div class="td">Not available</div>
                            <div class="td">Institutional Shares</div>
                            <div class="td">{{ $inst_share }}</div>
                            <div class="td">_</div>
                        </div>
                        <div class="tr">
                            <div class="td">Not Available</div>
                            <div class="td">Table Banking Loans</div>
                            <div class="td">_</div>
                            <div class="td">{{ $table }}</div>
                        </div>
                        @foreach ($general_ledgers as $item)
                            @if ($item->amount >= 0)
                                <div class="tr">
                                    <div class="td"> {{ $item->id }}</div>
                                    <div class="td"> {{ $item->name }}</div>
                                    <div class="td">_</div>
                                    <div class="td"> {{ $item->amount }}</div>
                                </div>
                            @endif
                        @endforeach
                        @foreach ($general_ledgers as $item)
                            @if ($item->amount < 0)
                                <div class="tr">
                                    <div class="td"> {{ $item->id }}</div>
                                    <div class="td"> {{ $item->name }}</div>
                                    <div class="td"> {{ $item->amount }}</div>
                                    <div class="td">_</div>
                                </div>
                            @endif
                        @endforeach
                        <div class="tr">
                            <div class="td">Total</div>
                            <div class="td">_</div>
                            <div class="td">{{ $final_liability }}</div>
                            <div class="td">{{ $final_assets }}</div>
                        </div>
                    </div>
                </div>




            </div>
    </section>

</body>

</html>
