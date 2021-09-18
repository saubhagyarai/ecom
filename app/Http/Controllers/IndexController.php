<?php

namespace App\Http\Controllers;

use App\Category;
use App\Page;
use App\Product;
use App\Slider;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{

    public function index()
    {
        $products = Product::latest()->take(7)->get();
        // dd($products);
        $cats = Category::where('feature', true)
        ->with('children')
        ->with('products')
        ->orderBy('priority', 'desc')->get();

        $randomProducts = Product::inRandomOrder()->take(6)->get();

        $sliders = Slider::orderBy('order')->get();

        $wishlistProducts = Wishlist::where('user_id',Auth::id())->get()->pluck('product_id');


        return view('frontend.index', compact('sliders','products','cats','randomProducts', 'wishlistProducts'));
    }

    public function category($catSlug)
    {
        $cat = Category::where('slug', $catSlug)->with('products')->firstOrFail();
        $catName = $cat->name;
        $products = $cat->allProducts();

        $wishlistProducts = Wishlist::where('user_id',Auth::id())->get()->pluck('product_id');

        return view('frontend.category', compact('products', 'catName', 'wishlistProducts'));
    }

    public function singleProduct($productSlug)
    {
        $product = Product::where('slug' , $productSlug)->with('categories')->first();
        $wishlistProducts = Wishlist::where('user_id',Auth::id())->get()->pluck('product_id');

        $catProducts = null;
        if ($product->categories->isNotEmpty()) {
            $catId = $product->categories->first()->id;
            $catProducts = Category::where('id', $catId)->with('products')->get();
        }

        return view('frontend.single_product', compact('product', 'catProducts', 'wishlistProducts'));
    }

    public function getContact()
    {
        return view('frontend.contact');
    }

    public function singlePage($pageSlug)
    {
        $page = Page::where('slug', $pageSlug)->firstOrFail();
        return view('frontend.page')->with('page', $page);
    }

    public function getWishlistProductId()
    {
        $wishlistProducts = Wishlist::where('user_id',Auth::id())->get();
        return $wishlistProducts;
    }

    public function search(Request $request)
    {
        $wishlistProducts = Wishlist::where('user_id',Auth::id())->get()->pluck('product_id');
        $query = request()->query('query');
        $products = Product::where('name', 'LIKE', "%$query%")->paginate(20);
        return view('frontend.search', compact('products', 'query', 'wishlistProducts'));
    }
}
