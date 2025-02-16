@extends('layouts.app')

@section('content')
<div class="container flex flex-col items-center justify-start mt-8">
    <h2>Set Your Monthly Budget</h2>
 

    @if (empty($categories))
    <div>
        <h1>Oops! You have no categories.</h1>
        <a href="{{ route('categories.create') }}">Click here to create some!</a>
    </div>
    @else
    <form action="{{ route('budget.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="amount" class="form-label">Budget Amount ($)</label>
            <input type="number" name="amount" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full" required>

            <label for="category">Category</label>
            <div class="mt-4">
                <select name="category" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full" required>
                    @foreach ($categories as $key => $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option> 
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Save Budget</button>
    </form>
    @endif
</div>
@endsection
