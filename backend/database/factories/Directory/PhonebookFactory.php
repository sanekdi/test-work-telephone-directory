<?php

namespace Database\Factories\Directory;

use App\Models\Directory\Category;
use App\Models\Directory\Phonebook;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhonebookFactory extends Factory
{
    protected $model = Phonebook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //$phone = preg_replace('/[^0-9]/', '', $this->faker->phoneNumber());
        //$phone = substr($phone, 0, 10);
        $phone =  $this->faker->phoneNumber();

        return [
            'family' => $this->faker->lastName,
            'name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstName,
            'phone' => $phone,
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
