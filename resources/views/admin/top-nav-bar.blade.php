@auth

@php
    $user_facebook = (!is_null(auth()->user()->Id_user_media)) ? request()->merge(['facebook_user' => true]) : request()->merge(['facebook_user' =>false]);
@endphp
<auth-nav-bar 
:auth_status="true" 
user="{{auth()->user()->username}}" 
:user_id="{{auth()->user()->id}}" 
avatar="{{auth()->user()->avatar}}" 
checkmediauser="{{request()->input('facebook_user')}}">
</auth-nav-bar>

@endauth


@guest
<top-bar show='{{Auth::check()}}'></top-bar>
<div class="mt-4 mb-4">
<nav-bar></nav-bar>
</div>
@endguest