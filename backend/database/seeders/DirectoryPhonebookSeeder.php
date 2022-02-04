<?php

namespace Database\Seeders;

use App\Models\Directory\Phonebook;
use Illuminate\Database\Seeder;

class DirectoryPhonebookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phonebook::factory()->count(20)->create();
    }
}
