@extends('layouts.app')

@section('content')
<div class="bg-[rgb(241, 241, 241)] min-h-screen">
@if(session('success'))
        <div class="bg-green-500 text-white w-1/4 mx-auto mt-4 p-4 rounded shadow-lg">{{ session('success') }}</div>
    @endif
<div>
    <div class="mt-8 text-center">
        <h2 class="text-4xl font-bold">
            My Total Expenses 
            <br>
        <span class="mt-4">${{ $totalExpense }}</span>    
        </h2>
    </div>
    <div class="mt-4 flex justify-center">
        <a href="{{ route('expenses.create') }}" class="bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Add Expense</a>
    </div>
</div>
    

 

   
    @if(count($expenses) !== 0)
    
    <div class="hidden md:block">
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
                        <div class="flex space-x-2">
                            <a href="{{ route('expenses.edit', $expense->id) }}" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-700">Edit</a>
                            @if($expense->receipt_url)
                                <a href="{{ $expense->receipt_url }}" class="bg-purple-500 text-white font-bold rounded hover:bg-purple-700 py-2 px-4 " target="_blank">
                                    Receipt
                                    <i class="fa-solid fa-arrow-down"></i>
                                </a>
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
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>





    @foreach($expenses as $expense)   
    
    <div class="block md:hidden">
    <table class="table-auto border-collapse border border-gray-400 table w-full m-8 bg-white-700 p-8 mx-auto max-w-7xl shadow-xl">
       
       <tr class="table-row border p-8">
           
          <td class="py-2 px-2 font-bold">Category</td>
           <td> {{ $expense->category }}</td>
          </tr>

          <tr class="table-row border p-8">
           <td class="py-2 px-2 font-bold">Amount</td>
           <td> ${{ number_format($expense->amount, 2) }}</td>
          </tr>

          <tr class="table-row border p-8">
           <td class=" py-2 px-2 font-bold">Date</td>
           <td>{{ $expense->date }}</td>
          </tr>

               <tr class="table-row border p-8">
                   <td class="py-2 px-2 font-bold">Description</td>
                   <td> {{ $expense->description ?? 'N/A' }}</td>
               </tr>
               

               <tr class="table-row border p-8">
                   <td class="py-2 px-2 font-bold">Modify/Delete</td>
                   <td class="px-2 py-2 w-1/2">
                       <span>
                           <a href="{{ route('expenses.edit', $expense->id) }}" class="rounded text-sm text-white bg-green-500 font-bold p-1">Edit</a>
                       </span>

                       
                       <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST">
                               @csrf
                               @method('DELETE')
                               <button type="submit" onclick="return confirm('Are you sure? Doing this will also delete any receipts that you have.')" class="rounded text-sm text-white bg-red-500 font-bold p-1 my-1">Delete</button>
                        </form>
                     
                    
                       
                   </td>               
           </tr>

           <tr>
            <td>Download Receipt</td>

            <td class="px-2 py-2 w-1/2">
            @if($expense->receipt_url)
                <a href="{{ $expense->receipt_url }}" target="_blank" class="rounded text-sm text-white bg-purple-500 font-bold p-2 m-2">Download Receipt</a>
            @else
            <span class="rounded text-sm text-white bg-gray-500 font-bold p-2 m-2">
                No Receipt
            </span>
            @endif
            </td>
           </tr>
       </table>
    </div>

    

        @endforeach

   
    @else
        <div class="mb-8 flex justify-center">
            <p class="text-2xl">No expenses found.</p>
        </div>    
    @endif

@endsection
