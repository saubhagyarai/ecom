<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{

    public function index()
    {
        return view('admin.setting')->with('settings', Setting::all());
    }

    public function store(Request $request)
    {
        $data = Setting::first();
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->map = $request->map;
        $data->top_ad1_text = $request->top_ad1_text;
        $data->top_ad2_text = $request->top_ad2_text;
        $data->top_ad3_text = $request->top_ad3_text;
        $data->bottom_ad_text = $request->bottom_ad_text;

        if($request->hasFile('favicon'))
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('favicon')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('favicon')->getClientOriginalExtension();
            // Filename to store
            $filenameToStoreImg = $filename.'_'.time().'.'.$extension;
            // Upload favicon 
            $path = $request->file('favicon')->storeAs('public/settings', $filenameToStoreImg);

            // Delete the old image
            if ($data->favicon != 'placeholder.jpg') 
            {
                Storage::delete('public/settings/'.$data->favicon);
            }

            // assign new image
            $data->favicon = $filenameToStoreImg;
        }

        if($request->hasFile('logo'))
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('logo')->getClientOriginalExtension();
            // Filename to store
            $filenameToStoreImg = $filename.'_'.time().'.'.$extension;
            // Upload logo 
            $path = $request->file('logo')->storeAs('public/settings', $filenameToStoreImg);

            // Delete the old image
            if ($data->logo != 'placeholder.jpg') 
            {
                Storage::delete('public/settings/'.$data->logo);
            }

            // assign new image
            $data->logo = $filenameToStoreImg;
        }

        if($request->hasFile('top_ad1_img'))
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('top_ad1_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('top_ad1_img')->getClientOriginalExtension();
            // Filename to store
            $filenameToStoreImg = $filename.'_'.time().'.'.$extension;
            // Upload top_ad1_img 
            $path = $request->file('top_ad1_img')->storeAs('public/settings', $filenameToStoreImg);

            // Delete the old image
            if ($data->top_ad1_img != 'placeholder.jpg') 
            {
                Storage::delete('public/settings/'.$data->top_ad1_img);
            }

            // assign new image
            $data->top_ad1_img = $filenameToStoreImg;
        }

        if($request->hasFile('top_ad2_img'))
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('top_ad2_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('top_ad2_img')->getClientOriginalExtension();
            // Filename to store
            $filenameToStoreImg = $filename.'_'.time().'.'.$extension;
            // Upload top_ad2_img 
            $path = $request->file('top_ad2_img')->storeAs('public/settings', $filenameToStoreImg);

            // Delete the old image
            if ($data->top_ad2_img != 'placeholder.jpg') 
            {
                Storage::delete('public/settings/'.$data->top_ad2_img);
            }

            // assign new image
            $data->top_ad2_img = $filenameToStoreImg;
        }

        if($request->hasFile('top_ad3_img'))
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('top_ad3_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('top_ad3_img')->getClientOriginalExtension();
            // Filename to store
            $filenameToStoreImg = $filename.'_'.time().'.'.$extension;
            // Upload top_ad3_img 
            $path = $request->file('top_ad3_img')->storeAs('public/settings', $filenameToStoreImg);

            // Delete the old image
            if ($data->top_ad3_img != 'placeholder.jpg') 
            {
                Storage::delete('public/settings/'.$data->top_ad3_img);
            }

            // assign new image
            $data->top_ad3_img = $filenameToStoreImg;
        }

        if($request->hasFile('bottom_ad_img'))
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('bottom_ad_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('bottom_ad_img')->getClientOriginalExtension();
            // Filename to store
            $filenameToStoreImg = $filename.'_'.time().'.'.$extension;
            // Upload bottom_ad_img 
            $path = $request->file('bottom_ad_img')->storeAs('public/settings', $filenameToStoreImg);

            // Delete the old image
            if ($data->bottom_ad_img != 'placeholder.jpg') 
            {
                Storage::delete('public/settings/'.$data->bottom_ad_img);
            }

            // assign new image
            $data->bottom_ad_img = $filenameToStoreImg;
        }

        $data->save();

        return redirect()->back()->with('success', 'Setting updated successfully.');
    }
}
