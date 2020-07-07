@extends('layouts.app')
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
                <thead>

                <tr>
                    <td>ID</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Action</td>


                </tr>
                </thead>
                <tbody>
                @foreach($products as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->product}}</td>
                        <td>{{$p->price}}</td>

                        <td>
                            <form action="{{url("user/order")}}" method="post">
                                @csrf
                                <input type="submit" value = "Make an order">
                                <input type="hidden" value = "{{$p->id}}" name = "product_id">
                            </form>


                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection

