<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Provider;
use App\Models\ProductProvider;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $product=new Product();
        $product=Product::factory()->create();
     
        $provider= Provider::find(1);
        $category= Category::find(1);
        $product->providers()->attach($provider);
        $product->categories()->attach($category);
        $pivot_id=ProductProvider::where(['product_id'=>$product->id, 'provider_id'=>$provider->id])->first()->id;
        $pivot=ProductProvider::find($pivot_id)->first();
        $pivot->price= $faker->numberBetween(199,499);
        $pivot->currency='rub';
        $pivot->update();
    }
}
