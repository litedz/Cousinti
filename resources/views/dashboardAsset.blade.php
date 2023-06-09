<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{asset ('images/logo.png')}}">
    <title>{{ config('app.name', 'Cousinti') }}</title>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{asset ('/css/ready.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('/css/custome.css')}}">
    


</head>

<body>

    <div id="app">
        <loading-page></loading-page>
        @yield('app')
    </div>

    @include('scripts.scripts_js')
    
    <script src="{{asset('/js/ready.min.js')}}"></script>





</body>

</html>