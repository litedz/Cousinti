@extends('root')
@section('app')
@include('admin.top-nav-bar')

@auth
<single-recipe recipe_id="{{$recipe_id}}" user_id="{{auth()->user()->id}}"></single-recipe>
@endauth
@guest
<single-recipe recipe_id="{{$recipe_id}}"></single-recipe>
@endguest


@endsection