@extends('layouts.site')

@section('content')
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->content }}</p>
    <div class="row">
        @foreach ($category->products as $product)
            @include('catalog.product')
        @endforeach
    </div>
@endsection