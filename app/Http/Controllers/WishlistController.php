<?php

namespace App\Http\Controllers;

use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $wishlistProducts = Wishlist::where('user_id',Auth::id())->with('product')->get();
        
        return view('frontend.wishlist', compact('wishlistProducts'));
    }

    public function removeProduct(Wishlist $wishlist)
    {
        $wishlist->delete();
        return back()->with('success', 'Product removed from wishlist');
    }

    public function addToWishlist(Product $product)
    {
        $ifProductExist = Wishlist::where('product_id', $product->id)->first();
        if (!empty($ifProductExist)) {
            return back()->with('fail', 'Product already added to Wishlist');
        }
        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id
        ]);

        return back()->with('success', 'Product added to wishlist');
    }
    
}