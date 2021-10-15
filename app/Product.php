<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = ['name','slug','price','sale_price','stock','description','featured_image', 'images'];

    /***
     * Delete featured image from storage
     */
    public function deleteImage()
    {
        Storage::delete('public/featured_images/'.$this->featured_image);
        
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    /***
     * Check whether product has categories or not
     * 
     * return bolean
     */
    public function hasCat($catId)
    {
        return in_array($catId, $this->categories->pluck('id')->toArray());
    }

        /**
     * Get the path of image
     */
    public function imageUrl()
    {
        return ($this->featured_image != 'placeholder.jpg') ?
        asset('storage/featured_images/'.$this->featured_image) :
        asset('front/assets/img/placeholder.jpg');
    }



}
