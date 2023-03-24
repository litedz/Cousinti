@extends('root')
@section('app')
@include('admin.top-nav-bar')<

<single-recipe recipe_id="{{$recipe_id}}"></single-recipe>

@endsection