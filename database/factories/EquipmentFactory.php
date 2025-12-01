<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment>
 */
class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['surface', 'underground', 'refurbished'];
        $conditions = ['New', 'Used', 'Refurbished'];
        
        return [
            'name' => $this->faker->unique()->words(3, true), // e.g., "Caterpillar D10T Dozer"
            'description' => $this->faker->paragraph(3),
            'category' => $this->faker->randomElement($categories),
            'condition' => $this->faker->randomElement($conditions),
            'year' => $this->faker->numberBetween(2010, 2023),
            'price' => $this->faker->numberBetween(5, 50),
            'image' => 'mining-logistics.jpg'
        ];
    }
}