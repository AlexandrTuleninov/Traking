@extends('layouts.site')

@section('content')
    <h1>Ваша корзина</h1>
    @if (count($cart_products))
        @php
            $basketCost = 0;
        @endphp
        <table class="table table-bordered">
            <tr>
                <th></th>
                <th>№</th>
                <th>Наименование</th>
                <th>Продавец</th>
                <th>Цена</th>
                <th>Кол-во</th>
                <th>Стоимость</th>
            </tr>
            <form action="{{route('order.add')}} " method="post" class="form-inline">
            @csrf
            @foreach($cart_products as $cart_product)
                @php
                    $product=$cart_product->product;
                    $name=$product->name;
                    $itemPrice = $product->price;
                    $itemQuantity =  $cart_product->quantity;
                    $provider = $cart_product->provider_id;
                    $itemCost = $itemPrice * $itemQuantity;
                    $basketCost = $basketCost + $itemCost;
                @endphp

                <tr>
                    
                    <td> <input type="checkbox" name='{{$loop->iteration}}' value='{{$cart_product->id}}'></td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$name}}</td>
                    <td>{{$provider}}</td>
                    <td>{{ number_format($itemPrice, 2, '.', '') }}</td>
                    <td>
                       
                        <span class="mx-1">{{ $itemQuantity }}</span>
                        
                    </td>
                    <td>{{ number_format($itemCost, 2, '.', '') }}</td>
                </tr>
            @endforeach
            <button type="submit" class="btn btn-success">Оформить</button>
            </form>
            <tr>
                <th colspan="6" class="text-right">Итого</th>
                <th>{{ number_format($basketCost, 2, '.', '') }}</th>
            </tr>
        </table>
    @else
        <p>Ваша корзина пуста</p>
    @endif
@endsection