<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(Auth::user());
        $userId = Auth::id();
        $userName = Auth::user()->name;
        // $userOrders = Order::where('user_id',$userId)->with('products')->get(['order_number','status','created_at']);
        $userOrders = Order::select('id','order_number','status','order_cancle_request','created_at')->where('user_id',$userId)->with('products')->get();
        // dd($userOrders);
        return view('home')->with('userOrders', $userOrders)->with('userName', $userName);
    }

    public function orderCancle(Order $order)
    {
      $order->order_cancle_request = 1;
      $order->save();
      
      return redirect()->back()->with('success', 'Order cancle request has been sent!');
    }

    public function changeUserPassword(Request $request)
    {
        $this->validate($request, array(
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password'
        ));

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) 
        {
            return back()->with('fail', 'You old password donot match our record!');
        }
        else 
        {
            $user->password = bcrypt($request->new_password);

            $user->update();

            session()->flash('success', 'Password Changed Successfully.');

            return back();
        }
    }
}
