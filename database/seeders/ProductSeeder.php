<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*    $table->id();
            $table->string('name');
            $table->double('price');
            $table->string('measure');
            $table->unsignedBigInteger('album_id');
            $table->index('album_id');
            $table->text('description');
            $table->double('commodity_volume');
            $table->timestamps();*/
        Product::create([
            'name'=>'product1',
            'price'=>'100',
            'measure'=>'m',
            
            'description'=>'text1',
            'commodity_volume'=>'1.1',
        ]);
    }
}
