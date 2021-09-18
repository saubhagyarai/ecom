<?php

namespace App;

use App\Http\Helpers\General\CollectionHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'parent_id', 'priority', 'feature', 'image'];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')
        ;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product')->orderBy('category_product.id', 'desc');
    }

    // get all the products of main category and it's sub categories
    public function allProducts()
    {
        // define empty collection
        $allProducts = collect([]);
        // get the product of main category
        $mainCatProducts = $this->products;
        // concat category's products in allProducts
        $allProducts = $allProducts->concat($mainCatProducts);
        // if main category has children category
        if ($this->children->isNotEmpty()) 
        {
            foreach($this->children as $child)
            {
                // concat all the child category's products in allProducts
                $allProducts = $allProducts->concat($child->products);
            }
        }

        // Size of paginated items
        $pageSize = 20;
        // dd($allProducts->sortBy('name'));

        // Paginate the collection allProducts
        $allProducts = CollectionHelper::paginate($allProducts->sortBy('name'), $pageSize);

        return $allProducts;
    }

    
    /***
     * Delete featured image from storage
     */
    public function deleteImage()
    {
        Storage::delete('public/categories/'.$this->image);
    }
}
