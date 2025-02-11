@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Your Budget</h2>
    <form action="{{ route('budget.update', $budget->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="amount" class="form-label">Budget Amount ($)</label>
            <input type="number" name="amount" class="form-control" value="{{ $budget->amount }}" required>

        </div>

        <div class="mb-3">
            <label for="notification_threshold" class="form-label">Notification Threshold (%)</label>
            <input type="number" name="notification_threshold" class="form-control" value="{{ old('notification_threshold', $budget->notification_threshold) }}" min="1" max="100">
        </div>

        <button type="submit" class="btn btn-primary">Update Budget</button>
    </form>
</div>
@endsection
