@extends('layouts.app')

@section('content')




<div class="container">
    <h2>Set Your Monthly Budget</h2>
<!-- If user does have categories display this page to them. -->

@if (empty($categories))
<div>
    <h1>Opps ! you have no categories</h1>
    <a href="#">click here to create some!</a>
</div>

@else
    <form action="{{ route('budget.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="amount" class="form-label">Budget Amount ($)</label>
            <input type="number" name="amount" class="form-control" required>

            <label for="">Category</label>
            <input type="text" name="category" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save Budget</button>
    </form>
</div>

@endif
@endsection
