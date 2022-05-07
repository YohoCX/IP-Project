<?php
$count=0
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
                        <th scope="col">Order ID</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Order Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $data)
                        <tr>
                            <th>{{$count=$count+1}}</th>
                            <th>{{$data->product_name}}</th>
                            <th>{{$data->product_price}}</th>
                            <th>{{$data->order_id}}</th>
                            <th>{{$data->order_date}}</th>
                            <th>{{$data->status}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
