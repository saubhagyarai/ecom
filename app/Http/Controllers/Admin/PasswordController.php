<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function getPasswordForm()
    {
        return view('admin.change-password');
    }

    public function postPasswordForm(Request $request)
    {
        // dd($request->all());
        $this->validate($request, array(
            'old-password' => 'required',
            'new-password' => 'required|min:6',
            'confirm-new-password' => 'required|same:new-password'
        ));

        $user = Auth::user();

        if (!Hash::check($request->input('old-password'), $user->password)) 
        {
            return back()->with('fail', 'You old password donot match our record!');
        }
        else 
        {
            $user->password = bcrypt($request->input('new-password'));

            $user->update();

            return back()->with('success', 'Password changed successfully.');
        }
    }
}
