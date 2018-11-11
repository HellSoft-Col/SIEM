<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIEM</title>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    <link rel="stylesheet" href="{{ asset('/css/calendar/calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/mystyle_user.css') }}">
</head>


<body id="page-top">

<main role="main" class="main">

    <div class="container ">
        <div class="row" style="margin-bottom: 70px; margin-top: 70px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! $calendar_details->calendar() !!}
                </div>
            </div>
        </div>
    </div>

</main>


<script src="{{ asset('/js/eventsFeedsGeneral/behavior.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar_details->script() !!}

<script src="{{ asset('js/fullcalendar/all.js') }}"></script>
<script>

    $(document).ready(function () {
        $('#calendar-'{{ $calendar_details->getId()}}).fullCalendar('option', 'locale', 'es');
    });

</script>

</body>


</html>
