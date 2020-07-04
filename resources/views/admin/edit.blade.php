@extends('app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="content">
            <div class="title m-b-md">
                Edit the product
            </div>
            <form action="/product/{{$product->id}}" method="post">
                @csrf
                @method("PUT")
                <label for="product">Product</label>
                <input type="text" name = "product" id = "product" value = "{{$product->name?? ''}}">
                <label for="price">Price</label>
                <input type="number" step = "0,01" name = "price" id = "price" {{$product->price?? ''}}>

                <input type="submit" value = "Save">
            </form>
        </div>
    </div>
@endsection


