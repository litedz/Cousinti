@extends('root')
@section('app')
{{$editPerm}}
<profile-user :profile="{{ $profile_user}}" :edit_perm={{$editPerm}}></profile-user>
@endsection