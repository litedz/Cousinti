@extends('app')
@section('app')




<top-bar show='{{Auth::check()}}'></top-bar>


@auth
@php
    if (is_null(auth()->user()->Id_user_media)) {
        request()->merge(['checkmediauser' => false]);
    }else {
        request()->merge(['checkmediauser' => true]);
    }
@endphp
<nav-bar
:auth_status="{{Auth::check()}}" 
user="{{auth()->user()->username}}" 
:user_id="{{auth()->user()->id}}" 
avatar="{{auth()->user()->avatar}}" 
checkmediauser="{{request()->input('facebook_user')}}">
></nav-bar>
@endauth
@guest
<nav-bar></nav-bar> 
@endguest

<index-page></index-page>


@endsection