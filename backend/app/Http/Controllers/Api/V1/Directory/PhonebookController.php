<?php

namespace App\Http\Controllers\Api\V1\Directory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Phonebook\StoreRequest;
use App\Http\Resources\Directory\PhonebookCollection;
use App\Http\Resources\Directory\PhonebookResource;
use App\Models\Directory\Category;
use App\Models\Directory\Phonebook;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
    public function index(): PhonebookCollection
    {
        return new PhonebookCollection(Phonebook::all());
    }

    public function show(Phonebook $phonebook): PhonebookResource
    {
        return new PhonebookResource($phonebook->load('category'));
    }

    public function store(StoreRequest $request): PhonebookResource
    {
       $request->validated();
       $category_id = $this->getIdCategoryToNameCategory($request);

       $data_phonebook  = $request->except('phonebook.category')['phonebook'];
       $data_phonebook['category_id'] = $category_id;

       $phonebook = Phonebook::create($data_phonebook);

       return new PhonebookResource($phonebook->load('category'));
    }

    public function update(Phonebook $phonebook, StoreRequest $request): PhonebookResource
    {
        $request->validated();
        $category_id = $this->getIdCategoryToNameCategory($request);

        $data_phonebook  = $request->except('phonebook.category')['phonebook'];
        $data_phonebook['category_id'] = $category_id;

        $phonebook->update($data_phonebook);

        return new PhonebookResource($phonebook->load('category'));
    }

    public function destroy(Phonebook $phonebook): void
    {
        $phonebook->delete();
    }

    /**
     * ID category
     * @param Request $request
     * @return int
     */
    private function getIdCategoryToNameCategory(Request $request): int
    {
        $name_category = $request->input('phonebook.category');

        $category = Category::firstOrCreate(['name' => $name_category], ['name' => $name_category]);
        $category->save();

        return $category->id;
    }
}
