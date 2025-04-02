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
    <br>
   <input type="time" name="notification_time" id="notification_time" value="{{ $user->formatted_notification_time }}">
    <br>
    <span>Note: You will receive notifications only if you have selected the option to receive emails.</span>

    
    <label for="timezone">Select Your Timezone: </label>
    <select name="timezone" id="timezone" required>
        @foreach(timezone_identifiers_list() as $timezone)
        <option value="{{ $timezone }}"  {{ $user->timezone === $timezone ? 'selected' : '' }}>
            {{ $timezone }}
        </option>
        @endforeach
    </select>

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


        // refactor later into own script file
        const timezoneSelect = document.getElementById('timezone');
        const detectedTimezone = Intl.DateTimeFormat().resolvedOptions().timeZone;

        // If the detected timezone exists in the dropdown, select it
        if (timezoneSelect) {
            const optionToSelect = Array.from(timezoneSelect.options).find(
                option => option.value === detectedTimezone
            );
            if (optionToSelect) {
                optionToSelect.selected = true;
            }
        }
    });


    


</script>

@endsection