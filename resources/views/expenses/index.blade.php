@extends('layouts.app')

@section('content')
<div class="container bg-[rgb(241, 241, 241)]">

<div>
    <div class="mt-8 flex justify-center">
        <h2 class="text-4xl font-bold">My Expenses</h2>
    </div>
    <div class="mt-4 flex justify-center">
        <a href="{{ route('expenses.create') }}" class="bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Add Expense</a>
    </div>
</div>
    

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

   

    <table class="border-collapse border border-gray-400 table w-full m-8 bg-white-700">
        <thead class="table-header-group">
            <tr class="table-row text-left">
                <th>Category ID</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="text-[rgb(55, 81, 61)]">
            @foreach($expenses as $expense)
                <tr class="table-row border">
                    <td>{{ $expense->category_id}}</td>
                    <td>{{ $expense->category }}</td>
                    <td>${{ number_format($expense->amount, 2) }}</td>
                    <td>{{ $expense->date }}</td>
                    <td>{{ $expense->description ?? 'N/A' }}</td>
                    <td class="float-left">
                        <div class="flex space-x-2">
                            <a href="{{ route('expenses.edit', $expense->id) }}" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-700">Edit</a>
                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
