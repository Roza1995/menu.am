@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('user/order') }}">Home</a>

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
                <h1>Cart</h1>
            </div>

            <table class = "table table-striped ">
                <thead>

                <tr>
                    <td></td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>


                </tr>
                </thead>
                <tbody>
                @foreach($cart->items as $p)
                    <tr>
                        <td><input  type="checkbox"  id="checkbox"></td>
                        <td><img src = "{{asset('storage/images/'.$p['product']->image)}}" style = "width:200px; height:150px"/></td>
                        <td>{{$p['product']->product}}</td>
                        <td>{{$p['price']}}</td>

                        <td>
                            {{$p['qty']}}
                        </td>

                    </tr>
                @endforeach
                <tr>
                    <td>Total Quantity</td>
                    <td>
                        {{$cart->getTotalQty()}}
                    </td>
                </tr>
                <tr>
                    <td>Total Price</td>
                    <td>
                        {{$cart->getTotalPrice()}}
                    </td>
                </tr>


                </tbody>
            </table>

            <form action="{{url('/charge')}}" method="POST">
                {{ csrf_field() }}
                <button id="checkout-button">Checkout</button>
                <script src="https://js.stripe.com/v3/">
                    var stripe = Stripe('pk_test_51H6eMsI4dSJifl9VTPFmoYHt1PTvfzblfis4pTdBEDvgpJ2rf0VfMtYOjuB1BuAmN5gUn0VTuoF6U6klCSDKkzAU00HCrYgFlX');
                    var response = fetch('/id').then(function(response) {
                        return response.json();
                    }).then(function(responseJson) {
                        var sessionID = responseJson.session_id;
                        // Call stripe.redirectToCheckout() with the Session ID.
                        var checkoutButton = document.getElementById('checkout-button');
                        checkoutButton.addEventListener('click', function() {
                            stripe.redirectToCheckout({
                                // Make the id field from the Checkout Session creation API response
                                // available to this file, so you can provide it as argument here
                                // instead of theplaceholder.
                                sessionId: '{{'session_id()'}}'
                            }).then(function (result) {
                                // If `redirectToCheckout` fails due to a browser or network
                                // error, display the localized error message to your customer
                                // using `result.error.message`.
                            });
                        });
                    });
                </script>
            </form>
        </div>
    </div>
@endsection

