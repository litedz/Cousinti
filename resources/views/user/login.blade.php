@extends('root')
@section('app')

@include('admin.top-nav-bar')
<login></login>



@endsection
<!-- <script>
FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
    var accessToken = response.authResponse.accessToken;
    console.log('connetcd with facebook');
  } 
} );

</script> -->