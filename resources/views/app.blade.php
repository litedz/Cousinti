<!DOCTYPE html>

<head>

    <link rel="icon" type="image/x-icon" href="{{asset ('images/logo.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset ('css/index.css')}}"> -->
    @include('scripts.scripts_css')

</head>

<body>


    <div id="app" class="font-amiri" style="background-color: #EBF1F4;">
        @yield('app')
    </div>



    @include('scripts.scripts_js')
    <script src="{{asset('js/effects.js')}}"></script>
</body>

</html>