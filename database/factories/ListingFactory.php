<?php

namespace Marketplaceful\Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Marketplaceful\Models\Listing;

class ListingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Listing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' => config('marketplaceful.user_model')::factory(),
            'title' => $this->faker->catchPhrase,
            'description' => $this->faker->paragraph,
            'price' => null,
            'feature_image_path' => null,
            'status' => 'draft',
            'published_at' => null,
        ];
    }

    public function published()
    {
        return $this->state([
            'status' => 'published',
            'published_at' => now(),
        ]);
    }

    public function draft()
    {
        return $this->state([
            'status' => 'draft',
        ]);
    }
}
