@extends('layouts.app')

@section('content')
<div class="bg-[rgb(241, 241, 241)] min-h-screen">
@if(session('success'))
        <div class="bg-green-500 text-white w-1/4 mx-auto mt-4 p-4 rounded shadow-lg">{{ session('success') }}</div>
    @endif
<div>
    <div class="mt-8 flex justify-center">
        <h2 class="text-4xl font-bold">
            My Total Expenses 
            <br>
        <span>${{ $totalExpense }}</span>    
        </h2>
    </div>
    <div class="mt-4 flex justify-center">
        <a href="{{ route('expenses.create') }}" class="bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Add Expense</a>
    </div>
</div>
    

 

   
    @if(count($expenses) !== 0)


    <table class="border-collapse border border-gray-400 table w-full m-8 bg-white-700 p-8 mx-auto max-w-7xl shadow-xl">
        <thead class="table-header-group">
            <tr class="table-row text-left">
                <th class="p-3">Category</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>

       
        <tbody>
            @foreach($expenses as $expense)
                <tr class="table-row border p-8">
                    <td class="p-3">{{ $expense->category }}</td>
                    <td>${{ number_format($expense->amount, 2) }}</td>
                    <td>{{ $expense->date }}</td>
                    <td>{{ $expense->description ?? 'N/A' }}</td>
                    <td class="float-left">
                        <div class="hidden md:flex space-x-2">



                            <a href="{{ route('expenses.edit', $expense->id) }}" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-700">Edit</a>


                            @if($expense->receipt_url)
                                <a href="{{ $expense->receipt_url }}" class="bg-purple-500 text-white text-sm font-bold py-2 px-4 rounded hover:bg-purple-700" target="_blank">Download Receipt</a>
                            @else
                            <div class="bg-gray-500 text-white font-bold py-2 px-4 rounded">
                            No Receipt
                            </div>
                            
                            @endif

                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700" onclick="return confirm('Are you sure? Doing this will also delete any receipts that you have.')">Delete</button>
                            </form>





                        </div>


                        <div class="block md:hidden">
                        <a href="{{ route('expenses.edit', $expense->id) }}" class="text-green-500 font-bold underline">Edit</a>


                            @if($expense->receipt_url)
                            <br>
                                <a href="{{ $expense->receipt_url }}" class="text-purple-500 font-bold underline" target="_blank">Download Receipt</a>
                            @endif

                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 font-bold underline" onclick="return confirm('Are you sure? Doing this will also delete any receipts that you have stored.')">Delete</button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="mb-8 flex justify-center">
            <p class="text-2xl">No expenses found.</p>
        </div>    
    @endif

@endsection
