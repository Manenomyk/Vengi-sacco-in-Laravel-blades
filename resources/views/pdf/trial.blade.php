<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    *{
        font-family: 'Nunito', sans-serif;
        font-size: 12px;
    }
        .table {
            display: table;
            width: 700px;
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
            display: flex;
            align-items: center;
            justify-content: center;
        }
     
    </style>
</head>

<body>
             
    <div class="center-report">
        <div class="div-table">
            <h2>Vengi Sacco Report</h2>
            <h2>{{ now()->toDateTimeString() }}</h2>
            <div class="title"><b>Trial Balance<b></div>
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
                    @if ($item->amount >= 0)
                        <div class="tr">
                            <div class="td"> {{ $item->name }}</div>
                            <div class="td"> {{ $item->amount }}</div>
                            <div class="td">null</div>
                            <div class="td"> null</div>
                        </div>
                    @endif
                @endforeach
                @foreach ($general_ledgers as $item)
                    @if ($item->amount < 0)
                        <div class="tr">
                            <div class="td"> null</div>
                            <div class="td"> null</div>
                            <div class="td"> {{ $item->name }}</div>
                            <div class="td"> {{ $item->amount }}</div>
                        </div>
                    @endif
                @endforeach
                <div class="tr">
                    <div class="td">Total</div>
                    <div class="td">{{ $final_assets }}</div>
                    <div class="td">Total</div>
                    <div class="td">{{ $final_liability }}</div>
                </div>
            </div>
        </div>


               

           
</body>

</html>
