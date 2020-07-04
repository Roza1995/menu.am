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
            <p>
                {{session()}}
            </p>
            <table class = "table table-striped">
                <thead>

                <tr>
                    <td>ID</td>
                    <td>Product</td>
                    <td>Price</td>

                </tr>
                </thead>
                <tbody>
                @foreach($product as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->product}}</td>
                        <td>{{$p->price}}</td>

                        <td>
                            <a href="{{url("product/{$p->id}")}}" class = "btn btn-primary">View</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection


