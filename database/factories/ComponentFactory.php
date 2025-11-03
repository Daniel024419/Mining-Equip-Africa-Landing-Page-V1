<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Component>
 */
class ComponentFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition(): array
   {
      $conditions = ['New', 'Used', 'Rebuilt', 'Refurbished'];

      return [
         'name' => $this->faker->unique()->words(3, true),
         'part_number' => strtoupper($this->faker->bothify('PN-####-???')),
         'description' => $this->faker->sentence(12),
         'manufacturer' => $this->faker->company(),
         'condition' => $this->faker->randomElement($conditions),
         'price' => $this->faker->optional()->randomFloat(2, 10, 50000),
         'image' => null,
      ];
   }
}
