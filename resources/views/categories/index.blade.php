@extends('layouts.app')

@section('content')
<div class="container">

<div class="mt-4 text-center">
<h1>Expense Categories</h1>
</div>
    

    <div class="mt-4">
      <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-3 min-h-[200px] shadow-xl p-4">
        @foreach($categories as $category)

        <li class="list-group-item p-5 bg-blue-500 rounded text-white shadow-xl max-h-36 flex items-center justify-center">{{ $category->name }}</li>  
           
        @endforeach
    </ul>
    </div>


    <div class="mt-4">
        <a href="{{ route('categories.create') }}" class="bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Add New Category</a>
    </div>
  
</div>
@endsection
