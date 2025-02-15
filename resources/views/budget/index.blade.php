@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-red-50" >Your Budget</h2>
    @if ($budget)
        <p>Monthly Budget: ${{ number_format($budget->amount, 2) }}</p>
        <a href="{{ route('budget.edit', $budget->id) }}" class="btn btn-primary">Edit Budget</a>
    @else
        <a href="{{ route('budget.create') }}" class="btn btn-success">Set Budget</a>
    @endif
</div>
@endsection
