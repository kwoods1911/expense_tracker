<form action="{{ route('budget.update') }}" method="post">
    @csrf
    <label for="">Monthly Budget</label>
    <input type="number" name="monthly_budget" step="0.01" required>

    <label>Notification Threshold (%):</label>
    <input type="number" name="notification_threshold" min="1" max="100" required>

    <label>Notification Type:</label>
    <select name="notification_type">
        <option value="email">Email</option>
        <option value="sms">SMS</option>
    </select>

    <button type="submit">Save</button>
</form>