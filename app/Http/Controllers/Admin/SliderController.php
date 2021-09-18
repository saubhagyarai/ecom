<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.slider.index')->with('sliders', Slider::orderBy('order')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'image'=>'required|mimes:jpeg,jpg,png',
            'order' => 'integer|nullable'
        ));


        if($request->hasFile('image'))
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $filenameToStoreImg = $filename.'_'.time().'.'.$extension;
            // Upload image 
            $path = $request->file('image')->storeAs('public/sliders', $filenameToStoreImg);

        }
        else
        {
            $filenameToStoreImg = 'placeholder.jpg';
        }

        $slider = Slider::create([
            'link' => $request->link,
            'order' => $request->order,
            'text' => $request->text,
            'image' => $filenameToStoreImg
        ]);

        // dd($slider);
        return redirect($request->referer)->with('success', 'Slider added successfully.');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.create')->with('slider', $slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, array(
            'image'=>'mimes:jpeg,jpg,png',
            'order' => 'integer|nullable'
        ));

        $data = $request->only(['text', 'order','link']);

        if($request->hasFile('image'))
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $filenameToStoreImg = $filename.'_'.time().'.'.$extension;
            // Upload image 
            $path = $request->file('image')->storeAs('public/sliders', $filenameToStoreImg);

            // Delete the old image
            if ($slider->image != 'placeholder.jpg') 
            {
                Storage::delete('public/sliders/'.$slider->image);
            }

            // assign new image
            $data['image'] = $filenameToStoreImg;
        }

        $slider->update($data);

        return redirect($request->referer)->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image != 'placeholder.img')
        {
            Storage::delete('public/sliders/'.$slider->image);
        }
    }
}
