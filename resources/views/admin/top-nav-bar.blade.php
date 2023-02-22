@auth
@php

    $user_facebook = (!is_null(auth()->user()->Id_user_media)) ? request()->merge(['facebook_user' => true]) : request()->merge(['facebook_user' =>false]);
@endphp
<top-nav-bar :auth_status="true" user="{{auth()->user()->username}}" user_id="{{auth()->user()->id}}" avatar="{{auth()->user()->avatar}}" :checkmediauser="{{request()->input('facebook_user')}}"></top-nav-bar>
@endauth
@guest
<nav-bar></nav-bar>
@endguest