<?php

namespace Database\Seeders;


use App\Models\Restaurant;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Restaurant::factory(10)->create();
        Product::factory(40)->create();
    }
}
