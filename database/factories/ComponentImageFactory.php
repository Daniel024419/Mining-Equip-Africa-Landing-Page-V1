<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComponentImage>
 */
class ComponentImageFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition(): array
   {
      return [
         'path' => 'components/' . $this->faker->lexify('image_????') . '.jpg',
         'caption' => $this->faker->optional()->sentence(6),
      ];
   }
}
