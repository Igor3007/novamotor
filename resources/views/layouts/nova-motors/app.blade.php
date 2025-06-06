<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.nova-motors.partials.head')
    {!! $settings->metric_head !!}
</head>

<body>

{!! $settings->metric_body !!}


@include('layouts.nova-motors.partials.header')

@yield('content')

@include('layouts.nova-motors.partials.footer')

@vite(['resources/js/app.js'])

@yield('js')

{!! $settings->metric_footer !!}


</body>
</html>
