@extends('layouts.app')

@section('content')
<div class="container flex flex-col items-center justify-start mt-8">
    <h2>Add New Category</h2>
    <form action="{{ route('categories.store') }}" method="POST" class="w-full max-w-md mt-8">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control ml-8" required>
        </div>
        <div class="flex justify-between mt-8">
            <button type="submit" class="btn btn-success">Add Category</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
