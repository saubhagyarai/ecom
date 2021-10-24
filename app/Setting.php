<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
     protected $fillable = [
        'phone' ,       'email' ,       'address' ,
        'map' ,     'top_ad1_text' ,       'top_ad2_text' ,       'top_ad3_text' ,       'bottom_ad_text' ,

        'favicon' ,

        'logo' ,

        'top_ad1_img' ,

        'top_ad2_img' ,
        'top_ad3_img' ,

        'bottom_ad_img'];
}
