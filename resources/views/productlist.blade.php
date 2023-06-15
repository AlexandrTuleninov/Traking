@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        @csrf
        <div class="col-md-12">
            @foreach($products as $product)    
            <div class="card">
               <p>{{$product->name}}</p>
               <div class="col-md-6">
    <p>Цена: {{ number_format($product->price, 2, '.', '') }}</p>
    <!-- Форма для добавления товара в корзину -->
    <form action="{{ route('cart.add', ['id' => $product->id]) }}"
          method="post" class="form-inline">
        @csrf
        <label for="input-quantity">Количество</label>
        <input type="text" name="quantity" id="input-quantity" value="1"
               class="form-control mx-2 w-25">
        <button type="submit" class="btn btn-success">Добавить в корзину</button>
    </form>
    
            </div>
            @endforeach
        </div>
        </form>
    </div>
</div>
@endsection
