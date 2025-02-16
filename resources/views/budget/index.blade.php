@extends('layouts.app')

@section('content')
<div class="container flex flex-col items-center justify-start mt-8">
    <h2 class="m-8 flex mt-4 text-3xl" >Your Budget</h2>
    @if ($budget)
        <p class="text-2xl">Monthly Budget: ${{ number_format($budget->amount, 2) }}</p>
        <a href="{{ route('budget.edit', $budget->id) }}" class="mt-8 bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Edit Budget</a>
    @else

    <div class="flex flex-col items-center justify-start mt-8">
    <h1 class=" m-8 text-3xl">You have not set a budget yet.</h1>
        <p>Lets get started with that. Click the button below.</p>
        <a href="{{ route('budget.create') }}" class="mt-8 bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Set Budget</a>
    </div>
        
    @endif
</div>
@endsection
