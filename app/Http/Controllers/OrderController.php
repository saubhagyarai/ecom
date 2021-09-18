<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Mail\OrderMail;
use App\Order;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function __construct()
    {
        // only authenticated user can store order
        // auth middleware only for store method
        $this->middleware('auth')->only(['store']);
        // admin middleware for all except sotre method
        // admin cannot store order
        $this->middleware('auth:admin')->except(['store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
        'pendingCount' => DB::table('orders')->where('status', 'pending')->count(),
        'processingCount' => DB::table('orders')->where('status', 'processing')->count(),
        'completedCount' => DB::table('orders')->where('status', 'completed')->count(),
        'declinedCount' => DB::table('orders')->where('status', 'declined')->count(),
        'order_cancle_requestCount' => DB::table('orders')->where('order_cancle_request','=', 1)->count(),
        'orders' => Order::latest()->paginate(30)
        ];

        return view('admin.order.index', compact('data'));

        // return view('admin.order.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request)
    {
        $order = Order::create([
            'order_number' => uniqid('GuruOrderNumber-'),
            'user_id' => Auth::id(),            
            'grand_total' => Cart::total(0,'.',''),
            'item_count' => Cart::count(),
            'billing_fullname' => $request->bill_fullname,
            'billing_address' => $request->bill_address,
            'billing_address2' => $request->bill_address2,
            'billing_city' => $request->bill_city,
            'billing_email' => $request->bill_email,
            'billing_phone' => $request->bill_phone,
            'notes' => $request->notes      
        ]);

        // Save order products
        $cartItems = Cart::content();
        foreach($cartItems as $item)
        {
            $order->products()->attach($item->id, ['price' => $item->price, 'quantity'=> $item->qty]);
        }

        // Send mail to customer after order is placed
        Mail::to($order->user->email)->send(new OrderMail($order));

        Cart::destroy();

        return redirect(route('index'))->with('order-success', 'Thank You! Your order has been placed successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

        return view('admin.order.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.order.edit')->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $data = $request->only(['order_number', 'status', 'grand_total', 'item_count', 'is_paid', 'bill_fullname', 'bill_address', 'bill_address2', 'bill_city', 'bill_email', 'bill_phone', 'notes']);

        // update the product
        $order->update($data);

        return redirect($request->referer)->with('success', 'Order updated successfully.');
        
    }


    /***
     * Update order paid 
     * 
     */
    public function orderPaid(Order $order, Request $request)
    {
        $order->is_paid = $request->is_paid;
        $order->save();
        return back()->with('success', 'Order updated successfully.');
    }

    /**
     * Order according to status
     * 
     */

    public function orderStatus($order)
    {

        $data = [
            'pendingCount' => DB::table('orders')->where('status', 'pending')->count(),
            'processingCount' => DB::table('orders')->where('status', 'processing')->count(),
            'completedCount' => DB::table('orders')->where('status', 'completed')->count(),
            'declinedCount' => DB::table('orders')->where('status', 'declined')->count(),
            'order_cancle_requestCount' => DB::table('orders')->where('order_cancle_request','=', 1)->count(),
            'allOrders' => DB::table('orders')->where('status', $order)->paginate(30),
        ];
        if ($order == 'order_cancle_request') 
        {
            $data['allOrders'] = DB::table('orders')->where('status', '!=', 'declined')->where('order_cancle_request', '=', 1)->paginate(30);
            return view('admin.order.status', compact('data', 'order'));
        }
        return view('admin.order.status', compact('data', 'order'));

    }
}
