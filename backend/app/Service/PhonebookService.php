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

    /**
     * @param string $family
     * @param string $name
     * @param string $middle_name
     * @param string $phone
     * @param string $category_name
     * @return Phonebook
     */
    public function add(string $family, string $name, string $middle_name, string $phone, string $category_name): Phonebook
    {

        $data_phonebook = [
            'family' => $family,
            'name' => $name,
            'middle_name' => $family,
            'phone' => $phone,
            'category_id' => $this->getIdCategoryToNameCategory($category_name),

        ];

        $phonebook = $this->phonebook::create($data_phonebook);

        return $phonebook;
    }

    public function edit(string $family, string $name, string $middle_name, string $phone, string $category_name, int $id): Phonebook
    {

        $phonebook = $this->phonebook->find(id);

        $data_phonebook = [
            'family' => $family,
            'name' => $name,
            'middle_name' => $family,
            'phone' => $phone,
            'category_id' => $this->getIdCategoryToNameCategory($category_name),

        ];

        $phonebook->update($data_phonebook);

        return $phonebook;
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
