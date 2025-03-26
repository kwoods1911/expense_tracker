@extends('layouts.app')

@section('content')

<div class="bg-[rgb(241, 241, 241)] min-h-screen">
@if(session('success'))
        <div class="bg-green-500 text-white w-1/4 mx-auto mt-4 p-4 rounded shadow-lg">{{ session('success') }}</div>
    @endif
<div>
    <div class="mt-8 flex justify-center">
        <h2 class="text-4xl font-bold">
            My Income
            <br>

            <span>$ {{ $totalIncome }}</span>
        </h2>
    </div>
    <div class="mt-4 flex justify-center">
        <a href="{{ route('income.create') }}" class="bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Add Income</a>
    </div>
</div>
    

 

@if(count($incomes) !== 0)

<div class="hidden md:block ">

<table class="border-collapse border border-gray-400 table w-full m-8 bg-white-700 p-8 mx-auto max-w-7xl shadow-xl">
        <thead class="table-header-group">
            <tr class="table-row text-left">
                <th class="p-3">Category</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>

       
        <tbody>
            @foreach($incomes as $income)
                <tr class="table-row border p-8">
                    <td class="p-3">{{ $income->name }}</td>
                    <td>${{ number_format($income->amount, 2) }}</td>
                    <td>{{ $income->income_description ?? 'N/A' }}</td>
                    <td class="float-left">



                        <div class="hidden md:flex space-x-2">
                            <a href="{{ route('income.edit', $income->id) }}" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-700">Edit</a>
                            <form action="{{ route('income.destroy', $income->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>

                        <div class="block md:hidden">
                        <a href="{{ route('income.edit', $income->id) }}" class="text-green-600 text-sm font-bold">Edit</a>
                            <form action="{{ route('income.destroy', $income->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 text-sm font-bold" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>



    @foreach($incomes as $income)
        
    <div class="block md:hidden">
    <table class="table-auto border-collapse border border-gray-400 table w-full m-8 bg-white-700 p-8 mx-auto max-w-7xl shadow-xl">
            <tr>
                <td class="p-3 px-2 font-bold">Category</td>
                <td>{{ $income->name }}</td>
            </tr>
            <tr>
                <td class="p-3 px-2 font-bold">Amount</td>
                <td>${{ number_format($income->amount, 2) }}</td>
            </tr>
            <tr>
                <td class="p-3 px-2 font-bold">Description</td>
                <td>{{ $income->income_description ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td class="p-3 px-2 font-bold">Actions</td>
                <td>
                    
                <span>
                <a href="{{ route('income.edit', $income->id) }}" class="rounded text-sm text-white bg-green-500 font-bold p-1">Edit</a>
                </span> 
                <form action="{{ route('income.destroy', $income->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded text-sm text-white bg-red-500 font-bold p-1 my-1" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                </td>
            </tr>
        </table>
    </div>
    
    

    @endforeach

    @else
        <div class="mb-8 flex justify-center">
            <p class="text-2xl">No income found.</p>
        </div>    
    @endif


@endsection