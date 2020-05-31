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
    <table>
        <tbody>
        <tr>
            <td style="width: 297.5px">
                <h4 class="nv-header nv-font-bc">
                    INVOICE TO
                </h4>
                <h2 style="color: #f9c431">
                    {{$invoiceDetails->client_name}}
                </h2>
                <div class="mb-3" style="font-weight: bold">
                    <div class="nv-label-2 nv-font-bc">
                        Address :  {{$invoiceDetails->address}}
                    </div>
                    <div class="nv-label-2 nv-font-bc">
                        Email   : {{$invoiceDetails->email}}

                    </div>
                    <div class="nv-label-2 nv-font-bc">
                        Phone   : {{$invoiceDetails->phone}}
                    </div>
                </div>
            </td>
            <td style="width: 297.5px; text-align: right">
                <h1 style="color: #f9c431">INVOICE</h1>
                INVOICE ID &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{str_pad( $invoiceDetails->job_order_id , 10, '0', STR_PAD_LEFT)  }}
            </td>
        </tr>
        </tbody>
    </table>

    <table class="nv-table table table-striped ">
        <thead class="bg_yellow">
        <tr>
            <td class="nv-font-bc" scope="col">Labor</td>
            <td class="nv-font-bc" scope="col">Labor Fee</td>
            <td class="nv-font-bc" scope="col">Part</td>
            <td class="nv-font-bc" scope="col">Quantity</td>
            <td class="nv-font-bc" scope="col">Unit Price</td>
        </tr>
        </thead>
        <tbody id="table-jo-history-list">

        @foreach($jobItems as $jo)
            <tr v-for="jo in jobOrderList">
                <td class="nv-font-bc" scope="col">{{$jo->service_name}}</td>
                <td class="nv-font-bc" scope="col">P {{$jo->service_fee}}</td>
                <td class="nv-font-bc" scope="col">{{$jo->product_name}}</td>
                <td class="nv-font-bc" scope="col">{{$jo->quantity}}</td>
                <td class="nv-font-bc"  scope="col">P {{$jo->unit_price}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <table class="table table-borderless">
        <tbody>
        <tr>
            <td class="bg_yellow" style="width: 107px">SUBTOTAL</td>
            <td class="bg_grey" style="width: 190px">{{ $joTotals->total_product_amount }}</td>
            <td class="bg_yellow" style="width: 107px">TOTAL</td>
            <td class="bg_grey" style="width: 190px">{{ $joTotals->totals }}</td>
        </tr>
        </tbody>
    </table>

    <table class="table table-borderless">
        <tbody>
        <tr>
            <td class="bg_yellow" style="width: 107px">OTHERS</td>
            <td class="bg_grey" style="width: 190px">{{ $invoiceDetails->notes }}</td>

            <td class="" style="width: 107px"></td>
            <td class="" style="width: 190px"></td>
        </tr>
        </tbody>
    </table>

    <table class="table table-borderless">
        <tbody>
        <tr>
            <td class="" style="width: 107px"></td>
            <td class="" style="width: 190px"></td>

            <td class="" style="width: 0px"></td>
            <td class="" style="width: 297px; color: red">
                "A FEE OF 500 PESOS STORAGE FEE WILL BE CHARGE TO THE CUSTOMER AFTER A SPAN OF 3 DAYS UPON COMPLETION AND NOTIFICATION TO THE OWNER. AN ADDITIONAL FEE OF 350 PESOS PER DAY AS ON GOING CHARGE FOR UNCLAIMED CARS AFTER ALLOTED TIME"
            </td>
        </tr>
        </tbody>
    </table>

</div>

</html>
