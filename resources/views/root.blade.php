<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>{{ config('app.name', 'Cousinti') }}</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="icon" type="image/x-icon" href="{{asset ('images/logo.png')}}">
    @include('scripts.scripts_css')

</head>

<body>
    <div id="app" class="font-amiri">
        <loading-page></loading-page>
        @yield('app')
    </div>


    @include('scripts.scripts_js')
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
</body>

</html>