@extends('dashboard')
@section('content')
    <div class="categories-container">

        <h2>Categories</h2>
        <div class="d-flex justify-content-end mb-3">
            @livewire('manage-categories')

        </div>
        
        @livewire('list-category')


    </div>
@endsection
