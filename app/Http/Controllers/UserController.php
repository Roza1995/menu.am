<?php

namespace App\Http\Controllers;

use App\Billing\Payment;
use App\Product;
use App\Order;
use App\Sales\TopUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $order = Order::with('product')->where('user_id', Auth::id())->get();
        //dd($order[0]->product->product);
        return response()->view('user.index',
           compact('products', 'order')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Payment $payment
     * @param TopUsers $users
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, Payment $payment, TopUsers $users)
    {
        $arr = [
            'name'=> 'jasmine',
            'lastname' => 'Beeh'
        ];
        $member = Arr::pull($arr, 'name');
        echo $member;
        dd($arr);
        dd(Arr::add($arr, 'lastname', 'Tbeeh'));
        $users->changeDiscount();
//        $payment = new Payment('USD');
        dd($payment->charge(800));
        $order = Order::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,

        ]);

        return  redirect('user/order/{$products->id}');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        return response()->view('user.show',
            ['products'=> $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        //
    }
}
