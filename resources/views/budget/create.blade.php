@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-start mt-8">
    <h2 class="m-8 flex mt-4 text-3xl">Set Your Monthly Budget</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="bg-red-500 text-white w-full mx-auto mt-4 p-4 rounded shadow-lg">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (count($categories) == 0)
    <div>
        <h1 class="m-8 flex mt-4 text-xl">Oops! You have no categories.</h1>
        <a class="bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700 mt-8" href="{{ route('categories.create') }}">Create categories</a>
    </div>
    @else
    <form action="{{ route('budget.store') }}" method="POST">
        @csrf
        <div class="mt-3">
            <label for="amount" class="form-label mt-8">Budget Amount ($)</label>
            <input type="number" name="amount" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full">

            <div>
            <label for="notification_threshold"> Set Notification (%): </label>
            <br/>
            <span class="text-xs">We will notify you when the budget hits this mark:</span>
            <input type="number" placeholder="E.g 80" name="notification_threshold" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full">
            </div>
            


            <label for="category">Category</label>
            <div class="mt-4">
                <select name="category" class="ml-8 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 mb-4 w-full" required>
                    @foreach ($categories as $key => $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option> 
                    @endforeach
                </select>
            </div>

           
        </div>
        <div class="flex justify-between mt-8">
                <button type="submit" class="bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Save Budget</button>
                <a href="{{ route('budget.index') }}" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700">Cancel</a>
        </div>

    </form>

    @livewireScripts
    @endif
</div>
@endsection
