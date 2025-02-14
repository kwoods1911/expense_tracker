@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">My Expenses</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('expenses.create') }}" class="bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Add Expense</a>

    <table class="table w-full m-8 bg-[rgb(255, 255, 255)] ">
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
                <tr class="table-row">
                    <td>{{ $expense->category_id}}</td>
                    <td>{{ $expense->category }}</td>
                    <td>${{ number_format($expense->amount, 2) }}</td>
                    <td>{{ $expense->date }}</td>
                    <td>{{ $expense->description ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('expenses.edit', $expense->id) }}" class="bg-green-500 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
