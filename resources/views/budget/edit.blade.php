@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-start mt-8">
    <h2 class="text-2xl">Edit Your Budget</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="bg-red-500 text-white w-full mx-auto mt-4 p-4 rounded shadow-lg">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('budget.update', $budget->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="amount" class="form-label">Budget Amount ($)</label>
            <input type="number" name="amount" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full" value="{{ $budget->amount }}" required>

        </div>

        <div class="m-8">
            <label for="notification_threshold" class="p-4">Notification Threshold (%)</label>
            <input type="number" name="notification_threshold" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full" value="{{ old('notification_threshold', $budget->notification_threshold) }}" min="1" max="100">
        </div>
        

        <div class="flex justify-between mt-8">
        <button type="submit" class="bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Update Budget</button>
        <a href="{{ route('budget.index') }}" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700">Cancel</a>
        </div>
       
    </form>
</div>
@endsection
