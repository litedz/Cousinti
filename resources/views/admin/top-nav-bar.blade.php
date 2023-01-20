@auth
<top-nav-bar :auth_status=true user="{{auth()->user()->username}}" avatar="{{auth()->user()->avatar}}"></top-nav-bar>
@endauth

@guest
<nav-bar></nav-bar>
@endguest