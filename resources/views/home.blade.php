@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(auth()->user()->user_type_id === 1)
                            {{ __('You are registered as an Admin') }}
                            <a href="{{ url('admin/product') }}">Welcome to your page</a>
                        @else
                            {{ __('You are registered as a User!') }}
                            <a href="{{ url('user/order') }}">Welcome to your page</a>
                        @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
