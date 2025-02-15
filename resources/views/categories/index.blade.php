@extends('layouts.app')

@section('content')
<div class="container">

<div class="mt-4">
<h2>Expense Categories</h2>
</div>
    

    <div class="mt-4">
      <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-3">
        @foreach($categories as $category)

        <li class="list-group-item p-5 bg-blue-500 rounded text-white">{{ $category->name }}</li>  
           
        @endforeach
    </ul>
    </div>


    <div class="mt-4">
        <a href="{{ route('categories.create') }}" class="bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700">Add New Category</a>
    </div>
  
</div>
@endsection
