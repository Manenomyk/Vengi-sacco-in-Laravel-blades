<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .sach-form {
            display: flex;
            justify-content: flex-end;
            margin-right: 10px;
        }

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
        .center-report{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
  
                <div class="space-content">
                    <div class="pdf" style="display: flex; flex-direction:row; ">
                        <form action="{{ url('view-members-pdf') }}" method="post" enctype="multipart/form-data"
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
                        <div class="title">Report</div>
                        @foreach ($records as $item)
                        @if ($loop->first)
                            <div class="title">Name: {{ $item->name }} </div>
                            <div class="title">Name: {{ $item->account_type }} </div>
                            <div class="title">Account Number: {{ $item->account_id }} </div>
                        @endif
                        @endforeach
                        <div class="table">
                            <div class="tr">
                                <div class="td">Type</div>
                                <div class="td">Amount</div>
                                <div class="td">Datetime</div>
                            </div>
                            @foreach ($records as $item)
                                <div class="tr">
                                    <div class="td">
                                        @if ($item->type == 1)
                                            credit
                                        @elseif ($item->type == 0)
                                            debit
                                        @endif
                                    </div>
                                    <div class="td">
                                        @if ($item->amount_without_interest==null)
                                        0
                                        @else
                                        {{ $item->amount_without_interest }}
                                      @endif
                                    </div>
                                    <div class="td">{{ $item->created_at->toDayDateTimeString() }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
    
                </div>
             

           
</body>

</html>
