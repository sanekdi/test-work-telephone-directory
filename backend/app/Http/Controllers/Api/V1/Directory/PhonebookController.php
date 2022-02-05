<?php

namespace App\Http\Controllers\Api\V1\Directory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Phonebook\StoreRequest;
use App\Http\Resources\Directory\PhonebookCollection;
use App\Http\Resources\Directory\PhonebookResource;
use App\Models\Directory\Category;
use App\Models\Directory\Phonebook;
use App\Service\PhonebookService;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
    private Phonebook $phonebook;
    private Category $category;
    private PhonebookService $phonebookService;

    public function __construct(Phonebook $phonebook, Category $category, PhonebookService $phonebookService)
    {

        $this->phonebook = $phonebook;
        $this->category = $category;
        $this->phonebookService = $phonebookService;
    }

    public function index(): PhonebookCollection
    {
        return new PhonebookCollection($this->phonebook::with('category')->get());
    }

    public function show(Phonebook $phonebook): PhonebookResource
    {
        return new PhonebookResource($phonebook->load('category'));
    }

    public function store(StoreRequest $request): PhonebookResource
    {
       $request->validated();

        $phonebook = $this->phonebookService->add(
            $request->input('phonebook.family'),
            $request->input('phonebook.name'),
            $request->input('phonebook.middle_name'),
            $request->input('phonebook.phone'),
            $request->input('phonebook.category'),
        );


       return new PhonebookResource($phonebook->load('category'));
    }

    public function update(Phonebook $phonebook, StoreRequest $request): PhonebookResource
    {
        $request->validated();

        $phonebookUpdate = $this->phonebookService->edit(
            $request->input('phonebook.family'),
            $request->input('phonebook.name'),
            $request->input('phonebook.middle_name'),
            $request->input('phonebook.phone'),
            $request->input('phonebook.category'),
            $phonebook->id,
        );

        return new PhonebookResource($phonebookUpdate->load('category'));
    }

    public function destroy(Phonebook $phonebook): void
    {
        $phonebook->delete();
    }

}
