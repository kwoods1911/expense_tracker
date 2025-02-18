@extends('layouts.app')

@section('content')
<div class="container flex flex-col items-center justify-start mt-8">
    <h2 class="m-8 flex mt-4 text-3xl" >Your Budget</h2>
    @if (count($budget) !== 0)

    <span>note you can only have one budget per category.</span>
<table class="border-collapse border border-gray-400 table w-full m-8 bg-white-700 p-8">
    <thead class="table-header-group">
        <tr class="table-row text-left">
            <th>Budget Category</th>
            <th>Budget Amount</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
 
    

    @foreach($budget as $information)
    <tr class="table-row border">
        <td><p class="text-2xl"> {{$information->category}}: </p></td>
        <td>${{ number_format($information->amount, 2) }}</td>
        <td><a href="{{ route('budget.edit', $information->id) }}" class="mt-8 bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Edit Budget</a></td>
    </tr>
    @endforeach
    </tbody>
    </table>
        <a href="{{ route('budget.create')}}" class="mt-8 bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Create New Budget</a>
        
    @else

    <div class="flex flex-col items-center justify-start mt-8">
    <h1 class=" m-8 text-3xl">You have not set a budget yet.</h1>
        <p>Lets get started with that. Click the button below.</p>
        <a href="{{ route('budget.create') }}" class="mt-8 bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Set Budget</a>
    </div>
        
    @endif
</div>
@endsection
