<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = DB::table('categories')->pluck('id')->toArray();
        $menus = DB::table('menus')->pluck('id')->toArray();

        foreach ($menus as $menuId) {
            DB::table('categories_menus')->insert([
                'category_id' => rand(1, count($categories)),
                'menu_id' => $menuId,
            ]);
        }
    }
}
