@extends('master')
@section('content')
<div class="order">
    <div class="check-container">
        <div class="bd-example">
            <table class="table">
                <tbody>
                <tr>
                    <td>Amount</td>
                    <td>{{$total}} UZS</td>
                </tr>
                <tr>
                    <td>Tax 0.5%</td>
                    <td>{{$total*0.005}} UZS</td>
                </tr>
                <tr>
                    <td>Standard Tashkent City Delivery</td>
                    <td>15000 UZS</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>{{$total+$total*0.005+15000}} UZS</td>
                </tr>
                </tbody>
            </table>
            <form action="/order_confirm" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input class="form-control" id="address" name="address" placeholder="Address to deliver">
                </div>
                <div class="mb-3">
                    <label for="postalCode" class="form-label">Postal Code</label>
                    <input class="form-control" id="postalCode" name="postal_code" placeholder="100XXX">
                </div>
                <div class="mb-3">
                    <p>Payment by delivery using UZCARD or Cash</p>
                </div>
                <input type="hidden" name="total" value="{{$total+$total*0.005+15000}}">
                <button type="submit" class="btn btn-warning confirm-order-button">Confirm Order</button>
            </form>
        </div>
    </div>
</div>
<style>
    .order{
        display:flex;
        justify-content: center;
    }
    .table{
        margin-top: 20px;
        margin-bottom: 20px;
        min-width: 800px;
    }
    .confirm-order-button{
        min-width: 800px;
        margin-bottom: 100%;
    }
</style>
@endsection
