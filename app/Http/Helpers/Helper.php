<?php

use App\Category;
use App\Page;
use App\Setting;

// get all the categories with its subcategories
function getCategories() 
{
    $categories = Category::whereNull('parent_id')->with('children')->get();
    return $categories;
}

function setting()
{
    $setting = Setting::first();

    return $setting;
}

function pages()
{
    $pages = Page::orderBy('order')->take(4)->get();
    return $pages;

}