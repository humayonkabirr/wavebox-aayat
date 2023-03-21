<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            $data['orders'] =  Order::get();
            return view('backend.orders.index', $data);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function padding()
    {
        if(Auth::check()){
            $data['orders'] =  Order::where('status', 1)->get();
            return view('backend.orders.index', $data);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function complete()
    {
        if(Auth::check()){
            $data['orders'] =  Order::where('status', 0)->get();
            return view('backend.orders.index', $data);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function rejected()
    {
        if(Auth::check()){
            $data['orders'] =  Order::where('status', 2)->get();
            return view('backend.orders.index', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $request->validate([
            'name' => 'required',
            'mobile' => 'required|integer',
            'address' => 'required',
            'shipping_cost' => 'required',
            'payment_method' => 'required',
        ]);

        $order = new Order();

        $order->product_id      = $request->product_id;
        $order->name            = $request->name;
        $order->mobile          = $request->mobile;
        $order->address         = $request->address;
        $order->country         = $request->country;
        $order->sale_price      = $request->sale_price;
        $order->shipping_cost   = $request->shipping_cost;
        $order->payment_method  = $request->payment_method;
        $order->status  = 1;
        $order->save();
        return back()->with('success', 'Your Order created successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function actions(Request $request)
    {
        if(Auth::check()){
            $order = Order::find($request->id);
        if($request->actiontype == 0){
            $order->status = 0;
            $order->update();
            return back();
        }elseif($request->actiontype == 2){
            $order->status = 2;
            $order->update();
            return back();
        }else{
            return back();
        }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
