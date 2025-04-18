@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-start mt-8 mx-auto block md:w-1/2 lg:w-1/3">
    <h2 class="mb-4 text-3xl">Add Expense</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="bg-red-500 text-white w-full mx-auto mt-4 p-4 rounded shadow-lg">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('expenses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

<div class="mb-3">
    <label for="category" class="block text-gray-700 font-bold mb-2">Category</label>
    
    <select name="category" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full">
        <option value="">Select a category</option>
        @foreach($categories as $category)
            <option value="{{ $category->name }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>

        <div class="mb-3">
            <label class="block text-gray-700 font-bold mb-2">Amount</label>
            <input type="number" step="0.01" name="amount" placeholder="e.g 1000" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full" required>
        </div>

        <div class="mb-3">
            <label class="block text-gray-700 font-bold mb-2">Date</label>
            <input type="date" name="date" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full" required>
        </div>

        <div class="mb-3">
            <label class="block text-gray-700 font-bold mb-2">Description (optional)</label>
            <textarea name="description" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full" placeholder="e.g Spent money on ...."></textarea>
        </div>


        <div class="mb-3">
        <label for="receipt"  class="block text-gray-700 font-bold mb-2">Receipt (PDF  of jpeg)</label>
        <input type="file" name="receipt" id="receipt" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full">
       
        </div>

        <span>Note: Max File is 50 MB</span>




<div class="flex justify-between mt-8">
    <button type="submit" class="bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700" onclick="return confirm('Confirm that you want to add this expense.')">Save Expense</button>
    <a href="{{ route('expenses.index') }}" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700">Cancel</a>
</div>

    </form>
</div>
@endsection
