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
            <a href="#">Order List</a>
            <a href="{{url("admin/product/create")}}" class = "btn btn-primary">Add new product</a>

            <table class = "table table-striped">
                <thead>

                <tr>
                    <td>ID</td>
                    <td>Product</td>
                    <td>Price</td>


                </tr>
                </thead>
                <tbody>
                @foreach($products as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->product}}</td>
                        <td>{{$p->price}}</td>

                        <td>
                            <a href="{{url("admin/product/{$p->id}")}}" class = "btn btn-primary">View</a>
                            <a href="{{url("admin/product/{$p->id}/edit")}}" class = "btn btn-success">Edit</a>
                            <form action="{{url("admin/product/{$p->id}")}}" method = "post">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>
@endsection

