@component('mail::message')

{!! html_entity_decode($message) !!}


<strong> {{ $user->name }} , <br/>
{{ $user->email }}<br>
{{ $user->phone }}
</strong>
@endcomponent

