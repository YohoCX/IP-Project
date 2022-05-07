@extends('master')
@section("content")

    <main class="text-center form-signin login">
        <form action="/login" method="POST">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            @csrf
            <div class="form-floating">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <button class="btn btn-dark login-button" type="submit">Sign in</button>
        </form>
    </main>

    <style>
        .login{
            margin-top: 50px;
            display: flex;
            justify-content: center;
        }
        .form-floating{
            margin-bottom: 10px;
        }
        .login-button{
            min-width: 200px;
            margin-bottom: 100%;
        }
    </style>

@endsection
