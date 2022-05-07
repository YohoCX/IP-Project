<?php
$total=0;
$count=0;
?>
@extends('master')
@section('content')
    <div class="cart">
        <div class="check-container">
            <div class="bd-example">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                        <th scope="col">Remove Item</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$count+1}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$total=$total+$product->price}}</td>
                        <td><a href="/removecart/{{$product->cart_id}}" class="btn btn-warning">Remove item</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <tr>
                    <a type="button" class="btn btn-warning order-button" href="/order">Order</a>
                </tr>
            </div>
        </div>
    </div>
    <style>
        .cart{
            display:flex;
            justify-content: center;
        }
        .table{
            margin-top: 20px;
            margin-bottom: 20px;
            min-width: 800px;
        }
        .order-button{
            min-width: 800px;
            margin-bottom: 100%;
        }
    </style>
@endsection
