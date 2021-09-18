<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as IlluminateView;

class CartController extends Controller
{
    // public function __construct()
    // {
    //     $categories = Category::whereNull('parent_id')->with('children')->get();
    //     // return $categories;
    //     IlluminateView::share('categories', $categories);
    // }

    public function addToCart(Request $request, Product $product)
    {
        
        $cart = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => ($product->sale_price) ? $product->sale_price : $product->price,
            'weight' => 0,
            'options' =>[
                'featured_image' => $product->featured_image,
                'slug' => $product->slug

            ]

        ]);
        
        return redirect()->back()->with('success', 'Item Added');
    }

    public function cart()
    {
        // Cart::destroy();
        return view('frontend.cart.cart');
    }

    public function deleteCart($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('success', 'Item Removed');
    }

    public function increaseCart($id, $qty)
    {
        Cart::update($id, $qty+1);
        
        $data = [
            'product' =>  Cart::get($id),
            'productSubTotal' => Cart::get($id)->total(0, '.', ''),
            'grandTotal' => Cart::total(0, '.', ''),
            'success' => 'Item Added' 

        ];

        return response()->json($data); 
    }

    public function decreaseCart($id, $qty)
    {
        Cart::update($id, $qty-1);

        $data = [
            'product' =>  Cart::get($id),
            'productSubTotal' =>  Cart::get($id)->total(0, '.', ''),
            'grandTotal' => Cart::total(0, '.', ''),
            'success' => 'Item Removed' 
        ];

        return response()->json($data); 
    }

    public function rapidAdd(Product $product)
    {
        $cart = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => ($product->sale_price) ? $product->sale_price : $product->price,
            'weight' => 0,
            'options' =>[
                'featured_image' => $product->featured_image,
                'slug' => $product->slug
            ]

        ]);

        $data = [
            'count' => Cart::content()->count(),
            'success' => 'Item Added' 
        ];
        return response()->json($data);    
    }

    public function checkout()
    {
        if(Cart::count() <= 0)
        {
            return redirect()->back()->with('fail', 'Cart is empty! Add some item.');
        }

        return view('frontend.checkout');
    }
}
