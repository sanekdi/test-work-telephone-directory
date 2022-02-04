<?php

namespace Database\Seeders;

use App\Models\Directory\Category;
use Illuminate\Database\Seeder;

class DirectoryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(10)->create();
    }
}
