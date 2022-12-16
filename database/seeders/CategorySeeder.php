<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public $categories = [
        'Cooperaciones',
        'Lanzamientos de productos',
        'Compras y adquisiciones'
    ];

    public function run()
    {
        foreach ($this->categories as $category) {
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
