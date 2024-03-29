<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <link rel="icon" type="image/x-icon" href="{{asset ('images/logo.png')}}">
    <title>{{ config('app.name', 'Cousinti') }}</title>
    
    @include('scripts.scripts_css')
</head>

<body>

    <div id="app" class="font-farhati" style="background: hsl(33deg 35% 99%)">
       @auth
       <email-verified :status='{{ (bool) auth()->user()->email_verified_at}}'></email-verified>
       @endauth
        <loading-page></loading-page>
        @yield('app')
    </div>



    @include('scripts.scripts_js')




</body>

</html>