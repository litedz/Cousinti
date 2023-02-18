@extends('root')
@section('app')
<dashboard :info="{{collect(auth()->user())->only('username','id','avatar','Id_user_media')}}"></dashboard>
@endsection
