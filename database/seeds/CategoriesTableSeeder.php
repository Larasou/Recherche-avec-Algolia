<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'PHP']);

        Category::create(['name' => 'Laravel']);

        Category::create(['name' => 'JavaScript']);

        Category::create(['name' => 'Vue.js']);

        Category::create(['name' => 'Eloquent']);

        Category::create(['name' => 'SQL']);

        Category::create(['name' => 'CSS']);
    }
}
