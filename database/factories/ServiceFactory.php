<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['equipment', 'consulting', 'support'];
        $icons = [
            'fas fa-truck-pickup',
            'fas fa-hard-hat',
            'fas fa-tools',
            'fas fa-cogs',
            'fas fa-people-carry'
        ];

        return [
            'title' => $this->faker->unique()->words(3, true),
            'description' => $this->faker->paragraph(3),
            'category' => $this->faker->randomElement($categories),
            'icon' => $this->faker->randomElement($icons),
            'image' => 'mining-logistics.jpg',
        ];
    }
}
