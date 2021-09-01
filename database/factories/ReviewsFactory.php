<?php

namespace Database\Factories;

use App\Models\reviews;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = reviews::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' =>function(){
                return Product::all()->random();
            },
            'customer_name' => $this->faker->name,
            'review' => $this->faker->paragraph,
            'star' => $this->faker->numberBetween(0,5),
          
        ];
    }
}
