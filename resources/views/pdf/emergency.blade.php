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
            font-size: 12px;
        }

        .table {
            display: table;
            border-collapse: collapse;
            width: 700px;
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

        .center-report {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="center-report">
        <div class="div-table">
            <div class="title">Vengi Sacco</div>
            <div class="title">Emergency</div>
            <div class="table">
                <div class="tr">
                    <div class="td">Member</div>
                    <div class="td">Account Number</div>
                    <div class="td">Id Number</div>
                    <div class="td">Interest</div>
                    <div class="td">Duration</div>
                    <div class="td">Amount</div>
                    <div class="td">Due date</div>
                    <div class="td">Date opened</div>
                    <div class="td">Status</div>
                </div>
                @foreach ($emergency_loans as $item)
                <div class="tr">
                    <div class="td">{{ $item->name }}</div>
                    <div class="td">{{ $item->id }}</div>
                    <div class="td">{{ $item->id_number }}</div>
                    <div class="td">{{ $item->interest }}</div>
                    <div class="td">{{ $item->duration }}</div>
                    <div class="td">{{ $item->amount_without_interest }}</div>
                    <div class="td">{{ $item->due_date }}</div>
                    <div class="td">{{ $item->created_at }}</div>
                    <div class="td">
                        @if ($item->is_approved==0)
                        pending
                        @elseif ($item->is_approved==1)
                        Approved
                      @endif
                    </div>
                </div>
                @endforeach
             

            </div>
        </div>
</body>

</html>
