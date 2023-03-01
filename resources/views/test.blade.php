<h1>test page</h1>

@foreach ( $comments as $comment )
   {{$comment->comment}}
@endforeach

{{$comments}}