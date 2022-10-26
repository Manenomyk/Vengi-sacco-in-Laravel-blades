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
            display: flex;
            align-items: center;
            justify-content: center;
        }
     
    </style>
</head>

<body>
             
                <div class="center-report">
                    <div class="div-table">
                        <div class="title">Trial Balance</div>
                        <div class="table">
                            <div class="tr">
                                <div class="td">Credit Type</div>
                                <div class="td">Credit Value</div>
                                <div class="td">Debit Type</div>
                                <div class="td">Debit Value</div>
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
                            <div class="tr">
                                @foreach ($general_ledgers as $item)
                                @if ($item->amount>=0)
                                
                                    <div class="td"> {{ $item->name }}</div>
                                    <div class="td"> {{ $item->amount }}</div>
                              
                                @endif
                                @endforeach
                                @foreach ($general_ledgers as $item)
                                @if ($item->amount<0)
                                    <div class="td"> {{ $item->name }}</div>
                                    <div class="td"> {{ $item->amount }}</div> 
                                @endif
                                @endforeach
                            </div>
                            <div class="tr">
                                <div class="td">Total</div>
                                <div class="td">{{ $loans_sum }}</div>
                                <div class="td">Total</div>
                                <div class="td">{{ $shares_sum }}</div>
                            </div>
                        </div>
                    </div>
    
                </div>
               

           
</body>

</html>
