<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $title = ucwords($this->faker->words(3, true));

        return [
            'reference_code' => Str::random(10),
            'title' => $title,
            'slug' => Str::slug($title),
            'category_id' => Category::inRandomOrder()->first()->id,
            'img_url' => 'https://images.freecreatives.com/wp-content/uploads/2017/10/flat-clapperboard-icon_1063-38.jpg',
            'release_year' => $this->faker->year(),
        ];
    }
}
