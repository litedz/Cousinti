@extends('root')
@section('app')

@include('admin.top-nav-bar')


<profile-user :profile="{{ $profile_user}}" :edit_perm="{{$editPerm}}"  :user_id="{{ auth()->user()->id }}"></profile-user>
@endsection
