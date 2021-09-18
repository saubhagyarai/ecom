<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str as IlluminateStr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->query('query')) 
        {
            $query = request()->query('query');
            $products = Product::where('name', 'LIKE', "%$query%")->paginate(20);
            return view('admin.product.index')->with('products', $products);
        }
        return view('admin.product.index')->with('products', Product::latest()->paginate('50'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // select all the parent category
        $categories = Category::where('parent_id', NULL)->get();
        return view('admin.product.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        if ($request->sale_price > $request->price) 
        {
            return back()->with('fail', 'Product sale price must be less than actual price.');

        }

        if($request->hasFile('featured_image'))
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('featured_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('featured_image')->getClientOriginalExtension();
            // Filename to store
            $filenameToStoreImg = $filename.'_'.time().'.'.$extension;
            // Upload featured_image 
            $path = $request->file('featured_image')->storeAs('public/featured_images', $filenameToStoreImg);

        }
        else
        {
            $filenameToStoreImg = 'placeholder.jpg';
        }

        if($request->hasFile('product_images'))
        {
            foreach($request->product_images as $product_image)
            {
            // Get filename with the extension
            $filenameWithExt = $product_image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $product_image->getClientOriginalExtension();
            // Filename to store
            $filenameToStoreProductImg = $filename.'_'.time().'.'.$extension;                
            // Upload product_images 
            $path = $product_image->storeAs('public/product_images', $filenameToStoreProductImg);
            // $product_image->move('public/product_images', $filenameToStoreProductImg);

            $product_images[] = $filenameToStoreProductImg;
            }
        }

        $product = Product::create([
            'name' => $request->name,
            'slug' => IlluminateStr::slug($request->name, '-'),
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'description' => $request->description,
            'featured_image' => $filenameToStoreImg,
            'images' => json_encode($product_images)
        ]);

        if($request->cats)
        {
            $product->categories()->attach($request->cats);
        }

        
        return redirect($request->referer)->with('success', 'Product added successfully.');
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
    public function edit(Product $product)
    {
        $categories = Category::where('parent_id', NULL)->get();
        return view('admin.product.edit')->with('product', $product)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request,Product $product)
    {
        $data = $request->only(['name', 'slug','price', 'sale_price', 'stock', 'description']);
        // Get the data, if slug already exists except from current product
        $slug = Product::where('slug', $data['slug'])->whereNotIn('id', [$product->id])->first();
        if (!empty($slug)) 
        {
            if ($data['slug'] === $slug->slug) 
            {
                return redirect()->back()->with('fail', 'Requested slug already exist. Please select unique slug.');
            }
        }

        if ($request->sale_price > $request->price) 
        {
            return back()->with('fail', 'Product sale price must be less than actual price.');

        }
        
        if($request->hasFile('featured_image'))
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('featured_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('featured_image')->getClientOriginalExtension();
            // Filename to store
            $filenameToStoreImg = $filename.'_'.time().'.'.$extension;
            // Upload featured_image 
            $path = $request->file('featured_image')->storeAs('public/featured_images', $filenameToStoreImg);

            // Delete the old image
            if ($product->featured_image != 'placeholder.jpg') 
            {
                $product->deleteImage();
            }

            // assign new image
            $data['featured_image'] = $filenameToStoreImg;
        }

        if($request->hasFile('product_images'))
        {
            foreach($request->product_images as $product_image)
            {
                // Get filename with the extension
                $filenameWithExt = $product_image->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $product_image->getClientOriginalExtension();
                // Filename to store
                $filenameToStoreProductImg = $filename.'_'.time().'.'.$extension;                
                // Upload product_images 
                $path = $product_image->storeAs('public/product_images', $filenameToStoreProductImg);
                $product_images[] = $filenameToStoreProductImg; 
            }
    
            if(json_decode($product->images))
            {
                $images = json_decode($product->images);
            }
            else 
            {
                $images = array();    
            }

            $newImages = array_merge($images , json_decode(json_encode($product_images)));

            $data['images'] = json_encode($newImages);

        }
        // dd($data);

        // Update categories
        if($request->cats)
        {
            $product->categories()->sync($request->cats);
        }

        // update the product
        $product->update($data);

        return redirect($request->referer)->with('success', 'Product updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->featured_image != 'placeholder.jpg')
        {
                $product->deleteImage();
        }    

        // Delete all the images
        if (json_decode($product->images))
        {
            foreach(json_decode($product->images) as $image)
            {
                Storage::delete('public/product_images/'.$image);
            }
        }
        $product->categories()->detach();

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }


    public function deleteProductImage(Request $request, Product $product)
    {
        // Get all the images of product
        $images = json_decode($product->images);
        // Delete the image from storage
        Storage::delete('public/product_images/'.$request->image);
        // Delete the image from existing image
        if (($key = array_search($request->image, $images)) !== false) 
        {
            // Remove image
            unset($images[$key]);
            // Rearrange the key of array
            $imagesRearranged = array_values($images);
        };

        $product->images = json_encode($imagesRearranged);
        $product->save();
        Session::flash('success', 'Image deleted successfully.');
        
        return response()->json('success');

    }
}
