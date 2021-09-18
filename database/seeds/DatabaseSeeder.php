<?php

use App\Category;
use App\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(Category::class, 7)->create();

        factory(Product::class,150)->create();

        $categories = App\Category::all();

        Product::all()->each(function ($product) use ($categories)
        {
            $product->categories()->attach(
                // $categories->random(rand(3,6))->pluck('id')->toArray()
                $categories->random(rand(1,6))->pluck('id')->toArray()
            );
        });
    }
}
