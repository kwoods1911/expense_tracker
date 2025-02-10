<p>Hi {{ $user->name }},</p>
<p>You have reached {{ $user->notification_threshold }}% of your monthly budget of ${{ $user->monthly_budget }}.</p>
<p>Current spending: ${{ $user->total_spent }}</p>
<p>Please review your budget.</p>
