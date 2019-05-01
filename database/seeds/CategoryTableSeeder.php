<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $category = new Category();
        $category->name = 'Люди';
        $category->save();

        $category = new Category();
        $category->name = 'Авто';
        $category->save();

        $category = new Category();
        $category->name = 'Технологии';
        $category->save();
    }
}
