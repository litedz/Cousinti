@extends('root')
@section('app')
@include('admin.top-nav-bar')

<single-recipe recipe_id="{{$recipe_id}}" user_id="{{auth()->user()->id}}"></single-recipe>

@endsection