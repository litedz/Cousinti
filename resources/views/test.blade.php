@extends('app')

@section('app')
@isset($status)
  <div class="alert alert-success position-fixed top-25">{{$status}}</div>
@endisset
@endsection
