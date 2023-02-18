@extends('root')
@section('app')
<profile-user :profile="{{ $profile_user}}" :edit_perm={{$editPerm}}></profile-user>
@endsection