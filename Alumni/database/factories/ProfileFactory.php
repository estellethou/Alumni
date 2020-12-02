<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> "1",
            'phone' => $this->faker->PhoneNumber,
            'description'=> $this->faker->paragraph(),
            'url_linkedin' => "https://www.linkedin.com/in/estelle-thou-5356b4132/",
            'url_github' => "https://github.com/EpitechIT2020",
            //'url_website',
            //'image' => $this->faker->imageUrl(360, 360, 'animals', true, 'cats'),
            //'resume'
        ];
    }

    //function imageUrl(
    //    int $width = 640,
    //    int $height = 480,
    //    ?string $category = null, /* used as text on the image */
    //    bool $randomize = true,
    //    ?string $word = null,
    //    bool $gray = false
    //): string; 
}
