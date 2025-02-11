@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Expense Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-success">Add New Category</a>
    <ul class="list-group mt-3">
        @foreach($categories as $category)
            <li class="list-group-item">{{ $category->name }}</li>
        @endforeach
    </ul>
</div>
@endsection
