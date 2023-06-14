@extends('layouts.site')

@section('content')
    <h1>Каталог товаров</h1>


    <h2>Разделы каталога</h2>
    <div class="row">
        @foreach ($roots as $root)
            @include('catalog.part.category', ['category' => $root])
        @endforeach
    </div>
@endsection