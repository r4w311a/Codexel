@extends('dashboard')
@section('content')
    <div class="product-container">

        <h2>Products</h2>
        <div class="d-flex justify-content-end mb-3">
            @livewire('manage-products')

        </div>
        
        @livewire('list-products')


    </div>
@endsection
