<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str as IlluminateStr;
use Psy\Util\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.page.index')->with('pages', Page::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
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
            'name'=>'required|unique:pages|string|max:100|',
            'title'=>'required|string|max:100',
            'order'=>'integer|nullable',
            'description' => 'required|string',
            'image' => 'required|image|max:5024'
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
            $path = $request->file('image')->storeAs('public/pages', $filenameToStoreImg);

        }
        else
        {
            $filenameToStoreImg = 'placeholder.jpg';
        }

        Page::create([
            'name' => $request->name,
            'slug' => IlluminateStr::slug($request->name, '-'),
            'title' => $request->title,
            'order' => $request->order,
            'description' => $request->description,
            'image' => $filenameToStoreImg
        ]);

        return redirect($request->referer)->with('success', 'Category added successfully.');
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
    public function edit(Page $page)
    {
        return view('admin.page.create')->with('page', $page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $this->validate($request, array(
            'name'=>'required|string|max:100|',
            'slug' => 'required',
            'title'=>'required|string|max:100',
            'order'=>'integer|nullable',
            'description' => 'required|string',
            'image' => 'image|max:5024'
        ));

        $data = $request->only(['name', 'slug', 'title', 'order', 'description', 'image']);
        // dd($data);
        // Get the data, if slug already exists except from updated product
        $slug = Page::where('slug', $data['slug'])->whereNotIn('id', [$page->id])->first();
        if (!empty($slug)) 
        {
            // if updated slug already exists
            if ($data['slug'] === $slug->slug) 
            {
                return redirect()->back()->with('fail', 'Requested slug already exist. Please select unique slug.');
            }
        }
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
            $path = $request->file('image')->storeAs('public/pages', $filenameToStoreImg);

            // Delete the old image
            if ($page->image != 'placeholder.jpg') 
            {
                Storage::delete('public/pages/'.$page->image);
            }

            // assign new image
            $data['image'] = $filenameToStoreImg;
        }

        // update page
        $page->update($data);

        return redirect($request->referer)->with('success', 'Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if($page->image != 'placeholder.img')
        {
            Storage::delete('public/pages/'.$page->image);
        }

        $page->delete();

        return redirect()->back()->with('success', 'Page deleted successfully.');
    }
}
