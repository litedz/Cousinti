@extends('root')
@section('app')
        @include('admin.top-nav-bar')
        <similar-recipes type='{{ request()->type }}'></similar-recipes>
@endsection