<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Stripe;
use Cart;
class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->guard('customer')->check()) {
            $carts = Cart::content();
            return view('checkout.index',compact('carts'));
        }else{
            return redirect()->route('customer.login');
        }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $stripe = new Stripe('sk_test_r5OKA4W0iIxbSfCzfBwfTEpd0076iKPzvN');

            $charge = $stripe->charges()->create([

                    'amount' => Cart::total(),
                    'currency' => 'USD',
                    'source' => $request->stripeToken, 
                    'description' => 'Order', 
                    'receipt_email' => $request->email, 
            ]);

            if ($charge) {
                Cart::destroy();
                return redirect()->route('thanks');
            }


        }catch(Exception $e){
            echo 'Error';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
