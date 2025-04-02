@extends('layouts.app')

@section('content')


<div>

<h1>User Settings</h1>
<span>User name</span>
<br>
<span>notification time:  {{$user->formatted_notification_time }}</span>
<br>

<span>Receive Notifications: {{ $user->formatted_notification_selection }}</span>
<br>


<a href="/editsettings/{{$user->id}}">Edit Settings</a>

</div>

@endsection