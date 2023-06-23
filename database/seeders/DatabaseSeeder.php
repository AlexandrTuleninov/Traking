<?php

namespace Database\Seeders;

use App\Models\Category;
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
      
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProviderTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
