@props(['subject','recipient','body'])

<div>
    
<x-mail::message>

Subject: {{$subject}}


Dear {{ $recipient}},

{{$body}}


</x-mail::message>
    
  
</div>