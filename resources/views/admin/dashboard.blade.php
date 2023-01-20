@extends('root')
@section('app')

<dashboard :info="{{collect(auth()->user())->only('username','id','avatar')}}"></dashboard>
@endsection
