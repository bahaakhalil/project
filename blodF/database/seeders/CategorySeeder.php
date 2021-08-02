<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $category1 = new Category();
       $category1->name = "IT";
       $category1->save();

       $category2 = new Category();
       $category2->name = "Management";
       $category2->save();

       Category::factory(100)->create();
    }
}
