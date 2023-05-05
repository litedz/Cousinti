@extends('app')


@section('app')
<dashboard-admin :info="{{collect(auth()->user())->only('username','id','avatar','Id_user_media')}}"></dashboard-admin>
@endsection