<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major_category_names = [
            '和食', '日本料理', '中華','イタリアン','韓国料理','ラーメン','海鮮'
        ];

        foreach ($major_category_names as $index=> $major_category_name) {
            for($i = 1 ; $i <=3 ;$i++ ){
                Category::create([
                    'name' => $major_category_name .$i,
                    'major_category_id' => $index + 1,
                ]);    
            }
        }
    }
}
