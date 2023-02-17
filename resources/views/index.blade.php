@extends('app')
@section('app')

@auth
@php
    if (is_null(auth()->user()->Id_user_media)) {
        request()->merge(['checkmediauser' => false]);
    }else {
        request()->merge(['checkmediauser' => true]);
    }
@endphp
<top-nav-bar :auth_status=true user="{{auth()->user()->username}}" avatar="{{auth()->user()->avatar}}" :checkmediauser="{{request()->input('checkmediauser')}}"></top-nav-bar>
@endauth

<index></index>

@endsection