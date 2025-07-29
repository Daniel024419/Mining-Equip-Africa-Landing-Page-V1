<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'category' => $this->faker->randomElement(['Gold Mining', 'Copper Mining', 'Iron Ore', 'Safety Training']),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(2),
            'image' => 'frontend/img/' . $this->faker->randomElement([
                'gold-mining-project.jpg',
                'copper-mining-project.jpg',
                'iron-ore-project.jpg',
                'training-project.jpg'
            ]),
            'badges' => $this->faker->randomElements([
                'RC Drilling', 'Equipment Lease', 'Operator Training',
                'Diamond Drilling', 'Underground', 'Maintenance',
                'Blast Drilling', 'High Altitude', 'Custom Rigs',
                'Certification', 'Safety', 'Multi-Country'
            ], rand(2, 3))
        ];
    }
}
