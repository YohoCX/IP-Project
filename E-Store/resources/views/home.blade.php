@extends('master')
@section('content')

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <img class="card-img-top" src={{URL::to('images/'.$product['photo'])}}>
                    </div>
                    <div class="card-footer bg-dark text-white">
                        <p class="card-text">{{$product['name']}}</p>
                        <p class="card-text">{{$product['price']}} UZS</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <form action="/add_to_cart" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product['id']}}">
                                    <button class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                                </form>
                                <a type="button" class="btn btn-sm btn-outline-secondary" href="detail/{{$product['id']}}">More info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
