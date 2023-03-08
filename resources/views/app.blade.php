<!DOCTYPE html>

<head>

  

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset ('images/logo.png')}}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    @include('scripts.scripts_css')

</head>

<body>


    {{-- <div id="app" class="font-farhati" style="background-color: #EBF1F4;"> --}}
    <div id="app" class="font-farhati" style="background: hsl(33deg 35% 99%)">
        <loading-page></loading-page>
        @yield('app')
    </div>



    @include('scripts.scripts_js')
    <script src="{{asset('js/effects.js')}}"></script>
</body>

</html>