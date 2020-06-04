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
        VEHICLE CHECK LIST
    </h4>
{{--    <h6>Checklist ID: #  {{  str_pad( $details->id, 10, '0', STR_PAD_LEFT)  }} </h6>--}}

    <table class="table table-borderless">
        <tbody>
            <tr>
                <td class="bg_yellow" style="width: 77px">CLIENT NAME</td>
                <td class="bg_grey" style="width: 220px">{{$details->first_name}} {{$details->last_name}}</td>
                <td class="bg_yellow" style="width: 77px">ORDER NO</td>
                <td class="bg_grey" style="width: 220px">{{ str_pad( $details->id, 10, '0', STR_PAD_LEFT) }}</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-borderless">
       <tbody>
       <tr>
           <td class="bg_yellow" style="width: 107px">CLIENT CONTACT NO.</td>
           <td class="bg_grey" style="width: 190px">{{ $details->contact }}</td>
           <td class="bg_yellow" style="width: 107px">ORDER RECEIVED</td>
           <td class="bg_grey" style="width: 190px">
{{--               {{ $details->order_received }}--}}
           </td>
       </tr>
       </tbody>
    </table>

    <table class="table table-borderless">
        <tbody>
        <tr>
            <td class="bg_yellow" style="width: 109px">ORDER DATE & TIME</td>
            <td class="bg_grey" style="width: 89px">{{ $details->created_at }}</td>
            <td class="bg_yellow" style="width: 99px">DATE PROMISED</td>
            <td class="bg_grey" style="width: 99px">
{{--                {{ $details->order_dt_promised }}--}}
            </td>
            <td class="bg_yellow" style="width: 99px">ACTUAL DATE</td>
            <td class="bg_grey" style="width: 99px">
{{--                {{ $details->order_actual_dt }}--}}
            </td>
        </tr>
        </tbody>
    </table>

    <table class="table table-borderless">
        <tbody>
        <tr>
            <td class="bg_yellow" style="width: 287px">OTHER NOTES</td>
            <td class="" style="width: 10px"></td>
            <td class="bg_yellow" style="width: 107px">TYPE</td>
            <td class="bg_grey" style="width: 190px">
{{--                {{ $details->type }}--}}
            </td>
        </tr>
        </tbody>
    </table>

    <table class="table table-borderless">
        <tbody>
        <tr>
            <td class="" style="width: 287px; border: 1px solid black">{{ $details->notes }}</td>
            <td class="" style="width: 10px"></td>
            <td class="" style="width: 297px; border: 1px solid black">
                <img style="width:100%" src="images/checklist-car-img.png">
            </td>
        </tbody>
    </table>

    <table class="table table-borderless">
        <tbody>
        <tr>
            <td class="bg_yellow" style="width: 107px">ODOMETER READING</td>
            <td class="bg_grey" style="width: 190px">
{{--                {{ $details->odometer_reading }}--}}
            </td>
            <td class="bg_yellow" style="width: 107px">MAKE & MODEL</td>
            <td class="bg_grey" style="width: 190px">
{{--                {{ $details->make_model }}--}}
            </td>
        </tr>
        </tbody>
    </table>

    <table class="table table-borderless">
        <tbody>
        <tr>
            <td class="bg_yellow" style="width: 107px">FUEL LEVEL</td>
            <td class="bg_grey" style="width: 190px">
{{--                {{ $details->fuel_level }}--}}
            </td>
            <td class="bg_yellow" style="width: 107px">PERSONAL ITEMS</td>
            <td class="bg_grey" style="width: 190px">
{{--                {{ $details->personal_items }}--}}
            </td>
        </tr>
        </tbody>
    </table>

    <table class="table table-borderless">
        <tbody>
        <tr>
            <td class="" style="width: 198px">
                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" disabled {{ strpos($details->service_categ, 'restoration') ? 'checked' : '' }}>
                <label for="vehicle1">RESTORATION</label><br>
            </td>
            <td class="" style="width: 198px">
                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" disabled {{ strpos($details->service_categ, 'Bodyworks') ? 'checked' : '' }}>
                <label for="vehicle1">BODY/WORK REPAIR</label><br>
            </td>
            <td class="" style="width: 198px">
                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" disabled {{ strpos($details->service_categ, 'service') ? 'checked' : '' }}>
                <label for="vehicle1">AUTO REPAIR/SERVICE</label><br>
            </td>
        </tr>
        </tbody>
    </table>

</div>

</html>
