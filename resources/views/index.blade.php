@extends('app')
@section('app')


@auth
<top-nav-bar :auth_status=true user="{{auth()->user()->username}}" avatar="{{auth()->user()->avatar}}"></top-nav-bar>
@endauth
<index></index>

@endsection