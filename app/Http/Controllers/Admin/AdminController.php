<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Order;
use App\Page;
use App\Product;
use App\Setting;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'revenue' => Order::where('status', '=', 'completed')->sum('grand_total'),
            'pendingCount' => DB::table('orders')->where('status', 'pending')->count(),
            'processingCount' => DB::table('orders')->where('status', 'processing')->count(),
            'completedCount' => DB::table('orders')->where('status', 'completed')->count(),
            'declinedCount' => DB::table('orders')->where('status', 'declined')->count(),
            'order_cancle_requestCount' => DB::table('orders')->where('order_cancle_request','=', 1)->count(),
            'sliderCount' => Slider::all()->count(),
            'productCount' => Product::all()->count(),
            'productCatCount' => Category::all()->count(),
            'pageCount' => Page::all()->count(),
            'orderCount' => Order::all()->count(),
            'messageCount' => Contact::all()->count(),
            'settingCount' => Setting::all()->count(),
            'userCount' => User::all()->count()

        ];
        return view('admin.admin', compact('data'));
    }
}
