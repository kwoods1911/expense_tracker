@extends('layouts.app')

@section('content')


<div class="flex flex-col items-center justify-start mt-8">

<h2 class="text-2xl">Notification Settings</h2>

<form action="{{ route('update.setting', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="receive_notifications" class="form-label">Receive Emails ?</label>
    <input type="checkbox" name="receive_notifications" id="receiveEmails" value="1">
    <br>


<label for="notification_time">Set Time to receive Emails</label>
<span>Notifcations are sent once daily</span>
    <br>
   <input class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full" type="time" name="notification_time" id="notification_time" value="{{ $user->formatted_notification_time }}">
    <br>
    <span>Note: You will receive notifications only if you have selected the option to receive emails.</span>

    
    <label for="timezone">Select Your Timezone: </label>
    <select name="timezone" id="timezone" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full" required>
        @foreach(timezone_identifiers_list() as $timezone)
        <option value="{{ $timezone }}"  {{ $user->timezone === $timezone ? 'selected' : '' }}>
            {{ $timezone }}
        </option>
        @endforeach
    </select>

   <br>
   <div class="flex justify-between mt-8">
        <input class="bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700" type="submit" value="Save Settings">
        <a href="{{ route('usersettings') }}" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700">Cancel</a>
    </div>
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