@auth
@php
    $face_user =false;
    if (!is_null(auth()->user()->Id_user_media)) {
       $face_user = true;
    }
@endphp
@endphp
<top-nav-bar :auth_status=true user="{{auth()->user()->username}}" avatar="{{auth()->user()->avatar}}" face_user="{{$face_user}}"></top-nav-bar>
@endauth
@guest
<nav-bar></nav-bar>
@endguest