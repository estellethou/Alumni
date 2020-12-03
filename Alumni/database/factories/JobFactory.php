<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'content' => $this->faker->text,
            'profile'=> 'Bachelors degree ', //
            'qualifications' => 'None', //
            'year_experiences' => $this->faker->randomDigit(), //
            'street_address' => $this->faker->streetAddress,
            'postal_code' => $this->faker->postcode,
            'city' => $this->faker->city,
            'contract' => 'Full Time',
            'contract_duration' => $this->faker->randomDigit(), //
            'company_name' => $this->faker->company,
            'sector' => $this->faker->bs,
            'user_id' => '1',
        ];
    }
}