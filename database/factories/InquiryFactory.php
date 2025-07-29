<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inquiry>
 */
class InquiryFactory extends Factory
{
     public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'service' => $this->faker->randomElement([
                'Equipment Purchase',
                'Equipment Leasing',
                'Drilling Services',
                'Maintenance',
                'Operator Training'
            ]),
            'message' => $this->faker->paragraph(3),
        ];
    }

}
