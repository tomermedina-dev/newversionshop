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
        BOOKED SERVICES
    </h4>

    <table class="nv-table table  ">
        <thead class="bg_yellow">
        <tr>
            <td class="nv-font-bc" scope="col">Service #</td>
            <td class="nv-font-bc" scope="col">Customer Name</td>
            <td class="nv-font-bc" scope="col">Service Name</td>
            <td class="nv-font-bc" scope="col">Booked Date</td>
            <td class="nv-font-bc" scope="col">Date of Service</td>
            <td class="nv-font-bc" scope="col">Time</td>
            <td class="nv-font-bc" scope="col">Notes</td>
        </tr>
        </thead>
        <tbody  v-for="(booking , index) in bookedServicesList">

        @foreach($bookingHistories as $bookingHistory)
            <tr  >

                <td  class="nv-font-bc">{{ str_pad( $bookingHistory->bookingData->id, 10, '0', STR_PAD_LEFT)  }}</td>
                <td class="nv-font-bc" scope="col">{{$bookingHistory->bookingData->first_name}} {{$bookingHistory->bookingData->last_name}}</td>
                <td class="nv-font-bc" scope="col">{{$bookingHistory->bookingData->service_title}}</td>
                <td class="nv-font-bc" scope="col">{{$bookingHistory->bookingData->created_at}}</td>
                <td class="nv-font-bc" scope="col">{{$bookingHistory->bookingData->service_date_new}}</td>
                <td class="nv-font-bc" scope="col">{{$bookingHistory->bookingData->service_time_new}}</td>
                <td class="nv-font-bc" scope="col">{{$bookingHistory->bookingData->notes}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>

</div>

</html>
