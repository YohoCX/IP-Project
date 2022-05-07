@extends('master')
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="product-image" src={{URL::to('images/'.$product['photo'])}}>
        </div>
        <div class="col-sm-6">
            <br>
            <h2>Name: {{$product['name']}}</h2>
            <h3>Price: {{$product['price']}}</h3>
            <h3>Brand: {{$product['brand']}}</h3>
            <h4>Description: {{$product['description']}}</h4>
            <br>
            <a href="/" type="button" class="btn btn-sm btn-outline-secondary">Go Back</a>
            <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product['id']}}">
                <button class="btn btn-sm btn-outline-secondary">Add to Cart</button>
            </form>
        </div>
    </div>
</div>
<style>
    .product-image{
        max-height: 500px;
        max-width: 500px;
    }
</style>

@endsection
