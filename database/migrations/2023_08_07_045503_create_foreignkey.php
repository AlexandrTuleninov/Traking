<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id','user_order_user_fk')->on('users')->references('id');
         
        });
        Schema::table('nomenclatures', function (Blueprint $table) {
            $table->index('id','nomeclature_provider_provider_idx');
            $table->foreign('order_id','order_nomeclature_order_fk')->references('id')->on('orders');
            $table->foreign('provider_id','nomeclature_provider_provider_fk')->references('id')->on('providers');
            $table->foreign('product_id','nomeclature_product_product_fk')->references('id')->on('products');
            $table->foreign('city_id','city_nomeclature_city_fk')->on('cities')->references('id');
            $table->foreign('country_id','country_nomeclature_country_fk')->on('countries')->references('id');
         
        });
        Schema::table('product_provider', function (Blueprint $table) {
            $table->foreign('product_id','product_provider_product_product_fk')->references('id')->on('products');
            $table->foreign('provider_id','product_provider_provider_provider_fk')->references('id')->on('providers');
         
        });
        Schema::table('providers', function (Blueprint $table) {
            
         
        });
        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('country_id','city_country_country_fk')->on('countries')->references('id');
         
        });
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('provider_id','provider_contact_provider_fk')->on('providers')->references('id');
         
        });
        Schema::table('city_provider', function (Blueprint $table) {
            $table->foreign('provider_id','provider_city_provider_fk')->on('providers')->references('id');
            $table->foreign('city_id','provider_city_city_fk')->on('cities')->references('id');
         
        });
        Schema::table('country_provider', function (Blueprint $table) {
            $table->foreign('provider_id','provider_country_provider_fk')->on('providers')->references('id');
            $table->foreign('country_id','provider_country_country_fk')->on('countries')->references('id');
        
        });
        Schema::table('products', function (Blueprint $table) {
           
        });
        Schema::table('category_product', function (Blueprint $table) {
            $table->foreign('category_id','category_product_category_fk')->on('categories')->references('id');
            $table->foreign('product_id','category_product_product_fk')->on('products')->references('id');
         
        });
        Schema::table('photos', function (Blueprint $table){
            $table->foreign('product_id','photo_product_product_fk')->on('products')->references('id');
        });
        Schema::table('carts', function (Blueprint $table){
            $table->foreign('user_id','cart_user_cart_fk')->on('users')->references('id');
        });
        /*Schema::table('album_photo', function (Blueprint $table) {
            $table->foreign('album_id','album_products_album_fk')->on('products')->references('album_id');
            $table->foreign('photo_id','album_photo_photo_fk')->on('photos')->references('id');
         
        });*/
        Schema::table('provider_user', function (Blueprint $table) {
            $table->foreign('provider_id','provider_user_provider_fk')->on('providers')->references('id');
            $table->foreign('user_id','provider_user_user_fk')->on('users')->references('id');
         
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
