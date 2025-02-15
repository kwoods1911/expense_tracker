@extends('layouts.app')

@section('content')
<div class="container flex flex-col items-center justify-start mt-8">
    <h2>Add New Category</h2>
    <form action="{{ route('categories.store') }}" method="POST" class="w-full max-w-md mt-8">
        @csrf
        <div class="mb-3">
            <label for="name" class="block text-gray-700 font-bold mb-2">Category Name</label>
            <input type="text" name="name" placeholder="e.g entertainment" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full" required>
        </div>
        <div class="flex justify-between mt-8">
            <button type="submit" class="bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700" onclick="return confirm('Categories cannot be delete. Do you want to continue ?')">Add Category</button>
            <a href="{{ route('categories.index') }}" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700">Cancel</a>
        </div>
    </form>
</div>
@endsection
