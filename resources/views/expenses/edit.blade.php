@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-start mt-8">
    <h2 class="mb-4 text-3xl">Edit Expense</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="bg-red-500 text-white w-full mx-auto mt-4 p-4 rounded shadow-lg">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@php




@endphp
    <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
        @csrf
        @method('PUT')


    <div class="mb-3">
    <label for="category" class="block text-gray-700 font-bold mb-2">Category</label>
    <select name="category" for="category" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full" required>
        <option value="">Select a category</option>
        @foreach(Auth::user()->categories as $category)
            <option value="{{ $category->name }}" {{ $expense->category_id == $category->id ? 'selected' : '' }} >
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full" value="{{ $expense->amount }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full" value="{{ $expense->date }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description (optional)</label>
            <textarea name="description" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full">{{ $expense->description }}</textarea>
        </div>


        <div class="flex justify-between mt-8">
        <button type="submit" class="bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Update Expense</button>
        <a href="{{ route('expenses.index') }}" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700">Cancel</a>
        </div>
        
    </form>
</div>
@endsection
