@extends('layouts.app')

@section('content')

<div class="text-center">
    <h2 class="m-8 mt-4 text-4xl">Your Budget (s)</h2>
    <span class="text-yellow-500 text-2xl">Note: you can only have one budget per category.</span>
</div>


<div class="items-center justify-center mt-8 mx-auto">
    @if (count($budget) !== 0)

    <table class="border-collapse border border-gray-400 table m-8 bg-white-700 p-8 mx-auto max-w-4xl w-full shadow-xl">
        <thead class="table-header-group">
            <tr class="table-row text-left">
                <th>Budget Category</th>
                <th>Budget Amount</th>
                <th>Notification Threshold</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>



            @foreach($budget as $information)
            <tr class="table-row border">
                <td>
                    <p class="text-2xl p-1"> {{$information->category}}: </p>
                </td>
                <td>${{ number_format($information->amount, 2) }}</td>
                <td>{{$information->notification_threshold}} %</td>
                <td class="p-1"><a href="{{ route('budget.edit', $information->id) }}" class="mt-8 bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Edit Budget</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
    <a href="{{ route('budget.create')}}" class="mt-8 bg-sky-500 text-white font-bold py-4 px-4 rounded hover:bg-sky-700 shadow-xl">Create New Budget</a>
</div>
    @else

    <div class="flex flex-col items-center justify-start mt-8">
        <h1 class=" m-8 text-3xl">You have not set a budget yet.</h1>
        <p>Lets get started with that. Click the button below.</p>
        <a href="{{ route('budget.create') }}" class="mt-8 bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Set Budget</a>
    </div>

    @endif
</div>
@endsection