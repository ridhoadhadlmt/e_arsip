<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
               'name'=>'Surat Undangan Rapat',
            ],
            [
               'name'=>'Surat Keterangan Usaha',
            ],

        ];
        foreach ($categories as $key => $category) {
            Category::create($category);
        }
    }
}
