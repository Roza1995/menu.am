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
                Product
            </div>

            <table class = "table table-striped">
                <tr>
                    <td>Product</td>
                    <td>{{$product->product??''}}</td>

                    <td>Price</td>
                    <td>{{$product->price??''}}</td>


                </tr>
            </table>
            <a href = "{{url('/product')}}">Back</a>
        </div>
    </div>
@endsection


