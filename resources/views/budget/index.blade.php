@extends('layouts.app')

@section('content')

<div class="bg-[rgb(241, 241, 241)] min-h-screen">
@if(session('success'))
        <div class="bg-green-500 text-white md:w-1/5 mx-auto mt-4 p-2 rounded shadow-lg">{{ session('success') }}</div>
    @endif
<div>
<div class="text-center">
    <h2 class="m-8 mt-4 text-4xl font-bold">My Total Budget  

    <br>
    <span class="mt-4">
    $ {{ $totalBudget }}
    </span>
    <br>
</h2>


</div>


<div class="text-center">
    <a href="{{ route('budget.create')}}" class="mt-8 bg-sky-500 text-white font-bold py-3 px-3 rounded hover:bg-sky-700 shadow-xl">Create New Budget</a>
    <br>
</div>

<div class="text-center mt-6">
<span class="mt-6">Email Notifications will be once daily at {{ $user->formatted_notification_time }} edit setting here:
    <a href="/usersettings" class="rounded text-sm text-sky-500 underline font-bold p-1">User Settings</a>
</span>
</div>



<div class="hidden md:block items-center justify-center mt-8 mx-auto">
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
                    <p class="p-1"> {{$information->category}}: </p>
                </td>
                <td>${{ number_format($information->amount, 2) }}</td>
                <td>{{$information->notification_threshold}} %</td>
                <td class="p-1">
                    <div class="hidden md:flex">
                        <a href="{{ route('budget.edit', $information->id) }}" class="mt-8 bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Edit Budget</a>
                    </div>                
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    @else

    <!-- <div class="flex flex-col items-center justify-start mt-8">
        <h1 class=" m-8 text-3xl">You have not set a budget yet.</h1>
        <p>Lets get started with that. Click the button below.</p>
        <a href="{{ route('budget.create') }}" class="mt-8 bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Set Budget</a>
    </div> -->
    @endif
</div>


<div class="block md:hidden">

@foreach($budget as $information)   
    
    <div class="block md:hidden">
    <table class="table-auto border-collapse border border-gray-400 table w-full m-8 bg-white-700 p-8 mx-auto max-w-7xl shadow-xl">
       
       <tr class="table-row border p-8">
           
          <td class="py-2 px-2 font-bold">Category</td>
           <td> {{ $information->category }}</td>
          </tr>

          <tr class="table-row border p-8">
           <td class="py-2 px-2 font-bold">Amount</td>
           <td> $ {{ number_format($information->amount, 2) }}</td>
          </tr>

          <tr class="table-row border p-8">
           <td class="py-2 px-2 font-bold">Notification</td>
           <td> $ {{ $information->notification_threshold }}</td>
          </tr>


          <tr class="table-row border p-8">
                <td class="py-2 px-2 font-bold">Edit</td>
                <td>
                    <a href="{{ route('budget.edit', $information->id) }}" class="mt-8 bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Edit Budget</a>
                </td>
          </tr>
       </table>
    </div>

    

@endforeach
</div>

@endsection