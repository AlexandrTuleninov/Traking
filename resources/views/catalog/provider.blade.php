@extends('layouts.site')

@section('content')
    <h1>{{ $provider->name }}</h1>
    <p>{{ $provider->content }}</p>
    <div class="row">
        @foreach ($provider->products as $product)
            @include('catalog.product')
        @endforeach
    </div>
@endsection