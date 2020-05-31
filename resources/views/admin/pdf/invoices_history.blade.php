<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
        .paddingers {
            padding: 10px;
        }

        .bg_yellow {
            background-color: #f9c431;
        }

        .bg_grey {
            background-color: #f3f3f3;
        }

        @page {
            margin-bottom: 0px;
            margin-left: 0px;
            margin-right: 0px;
            margin-top: 20px;
        }

        table {
            font-size: 10px
        }
    </style>
</head>

<html>
<div class="container">
    <h4 class="nv-header nv-font-bc">
        CHECKLIST HISTORY
    </h4>

    <table class="nv-table table table-striped " v-if="jobList.length > 0">
        <thead class="bg_yellow">
        <tr>
            <td class="nv-font-bc" scope="col">Invoice ID</td>
            <td class="nv-font-bc" scope="col">Job Order ID</td>
            <td class="nv-font-bc" scope="col">Client Name</td>
            <td class="nv-font-bc" scope="col">Payment Status</td>
        </tr>
        </thead>
        <tbody id="labor-list"  >

        @foreach($invoices as $invoice)

            <tr v-for="jo in jobList">
                <td class="nv-font-bc" scope="col">
                    {{str_pad( $invoice->id, 10, '0', STR_PAD_LEFT)}}
                </td>
                <td class="nv-font-bc" scope="col">
                    {{$invoice->job_order_id}}
                </td>
                <td class="nv-font-bc" scope="col">
                    {{$invoice->client_name}}
                </td>
                <td class="nv-font-bc" scope="col">
                    @if($invoice->total_paid == $invoice->totals)
                        <span v-if="jo.total_paid == jo.totals">
                          Fully Paid
                        </span>
                    @else
                        <span v-else>Unpaid</span>
                    @endif
                </td>
            </tr>

        @endforeach

        </tbody>

    </table>

</div>

</html>
