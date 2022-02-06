<?php

namespace App\Http\Requests\Phonebook;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'phonebook.family' => 'required|string|max:255',
            'phonebook.name' => 'required|string|max:255',
            'phonebook.middle_name' => 'required|string|max:255',
            'phonebook.phone' => 'required|string|max:20',
            'phonebook.category' => 'required|string|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'phonebook.family' => 'фамилия',
            'phonebook.name' => 'фамилия',
            'phonebook.middle_name' => 'отчество',
            'phonebook.phone' => 'телефон',
            'phonebook.category' => 'категория',
        ];
    }
}
