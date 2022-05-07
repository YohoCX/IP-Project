<?php
use App\Http\Controllers\HomeController;
$count=0;
if(Session::has('user')){
    $count = HomeController::cartCount();
}
?>

<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="/cart" class="nav-link px-2 text-white">Cart ({{$count}})</a></li>
                <li><a href="/orders" class="nav-link px-2 text-white">Orders</a></li>
            </ul>

            @if(Session::has('user'))
                <a type="button" class="btn btn-outline-light me-2" href="/logout">Logout</a>
            @else
            <div class="text-end">
                <a type="button" class="btn btn-outline-light me-2" href="/login">Login</a>
                <a type="button" class="btn btn-warning" href="/register">Sign-up</a>
            </div>
            @endif
        </div>
    </div>
</header>
