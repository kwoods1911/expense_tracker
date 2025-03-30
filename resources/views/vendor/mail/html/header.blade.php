@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block; text-decoration: underline;">
@if (trim($slot) === 'Laravel')
<!-- <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="El Cheapo"> -->

<h1>El Cheapo</h1>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
