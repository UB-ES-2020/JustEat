<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $user = Auth::user();
        $userId = Auth::id();
        
        $validator = $request->validate([
            'restaurant_id' => 'required|integer',
            'products' => 'required|array|min:1',
            'products.*.id' => 'required|integer',
            'products.*.quantity' => 'required|numeric|min:0',
            'products.*.price' => 'required|numeric|min:0'
        ]);

        $status = 'SELECTED';
        
        $total = 0;
        foreach ($request->products as $product) {
            $total += $product['price'] * $product['quantity'];
        };

        $order = Order::create([
            'user_id' => $userId,
            'restaurant_id' => $request->restaurant_id,
            'total' => $total,
            'status' => $status,
        ]);

        $products = array();

        foreach ($request->products as $product) {
            $order_item = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'price' => $product['price'],
                'quantity' => $product['quantity']
            ]);

            array_push($products, $order_item);
        };

        return response()->json(array('order' => $order, 'products' => $products), 201);
    }

    public function addAddress(Request $request, $id) {
        $user = Auth::user();

        $validator = $request->validate([
            'address_id' => 'required|integer'
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());
        $order->update(['status' => 'ADDRESSED']);
    
        return response()->json($order, 200);
    }

    public function addDeliveryTime(Request $request, $id) {
        $user = Auth::user();

        $validator = $request->validate([
            'details' => 'nullable|string',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());
        $order->update(['status' => 'TIMED']);
    
        return response()->json($order, 200);
    }

    public function pay(Request $request, $id) {
        $user = Auth::user();

        $order = Order::findOrFail($id);
        $order->update(['status' => 'PAID - PROCESSING FOR DELIVERY']);
    
        return response()->json($order, 200);
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
