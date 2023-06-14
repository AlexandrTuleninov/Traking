@extends('layouts.site')

@section('content')
    <h1>{{ $provider->name }}</h1>
    <p>{{ $provider->content }}</p>
    <div class="row">
        @foreach ($provider->products as $product)
            @include('part.product')
        @endforeach
    </div>
@endsection