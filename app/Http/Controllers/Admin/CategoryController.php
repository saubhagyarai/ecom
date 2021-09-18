<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Psy\Util\Str as PsyStr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select all the parent category
        $categories = Category::where('parent_id', NULL)->get();

        return view('admin.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create')->with('categories', Category::where('parent_id', NULL)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
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
            $path = $request->file('image')->storeAs('public/categories', $filenameToStoreImg);

        }
        else
        {
            $filenameToStoreImg = 'placeholder.jpg';
        }

        $Category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'parent_id' => $request->parent_id,
            'priority' => $request->priority,
            'feature' => $request->feature,
            'image' => $filenameToStoreImg
        ]);

        return redirect($request->referer)->with('success', 'Category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // get all parent category
        $categories = Category::where('parent_id' , NULL)->get();

        return view('admin.category.create')->with('category', $category)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->only(['name', 'slug', 'priority', 'parent_id', 'feature']);
        // Get the data, if slug already exists except from updated product
        $slug = Category::where('slug', $data['slug'])->whereNotIn('id', [$category->id])->first();
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
            $path = $request->file('image')->storeAs('public/categories', $filenameToStoreImg);

            // Delete the old image
            if ($category->image != 'placeholder.jpg') 
            {
                $category->deleteImage();
            }

            // assign new image
            $data['image'] = $filenameToStoreImg;
        }

        // update category
        $category->update($data);

        return redirect($request->referer)->with('success', 'Category updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->image != 'placeholder.img')
        {
            $category->deleteImage();
        }

        // delete children category images
        $category->children->each(function ($children) {
            if($children->image != 'placeholder.jpg')
            {
                $children->deleteImage();
            }
        });

        // detach the products associated with the category from pivot table
        $category->products()->detach();

        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    public function featureCategory(Request $request, Category $category)
    {
        // dd($feature);
        $category->feature = $request->feature;
        $category->save();

        return back()->with('success', 'Category updated successfully.');
    }
}
