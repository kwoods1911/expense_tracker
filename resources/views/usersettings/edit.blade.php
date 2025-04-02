@extends('layouts.app')

@section('content')


<div>

<h1>Notification Settings</h1>

<form action="{{ route('update.setting', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="receive_notifications">Receive Emails ?</label>
    <input type="checkbox" name="receive_notifications" id="receiveEmails" value="1">
    <br>


<label for="notification_time">Set Time to receive Emails</label>
<span>Notifcations are sent once daily</span>

   <input type="time" name="notification_time" id="notification_time" value="">
    <br>
    <span>Note: You will receive notifications only if you have selected the option to receive emails.</span>

    


   <br>
    <input type="submit" value="Save Settings">
</form>
</div>


<script>
    //check is page is loaded
    document.addEventListener('DOMContentLoaded', function() {
        let receivedEmailsCheckbox = document.getElementById('receiveEmails');
        let notificationTimeSelect = document.getElementById('notification_time');
        
        receivedEmailsCheckbox.checked = true;
        
        receivedEmailsCheckbox.addEventListener('change', function() {
            this.checked ? notificationTimeSelect.disabled = false : notificationTimeSelect.disabled = true;
        });
    });
</script>

@endsection