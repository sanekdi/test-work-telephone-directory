<?php

namespace App\Service;

use App\Models\Directory\Category;
use App\Models\Directory\Phonebook;

class PhonebookService
{
    private Phonebook $phonebook;
    private Category $category;

    public function __construct(Phonebook $phonebook, Category $category)
    {

        $this->phonebook = $phonebook;
        $this->category = $category;
    }

    public function add(string $family, string $name, string $middle_name, string $phone, string $category_name)
    {

    }

    /**
     * @param string $name_category
     * @return int
     */
    private function getIdCategoryToNameCategory(string $name_category): int
    {

        $category = $this->category::firstOrCreate(['name' => $name_category], ['name' => $name_category]);
        $category->save();

        return $category->id;
    }
}
