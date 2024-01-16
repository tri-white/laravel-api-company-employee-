<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Companies;
use App\Models\Employees;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employees>
 */
class EmployeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'=>fake()->name(),
            'last_name'=>fake()->name(),
            'email'=>fake()->unique()->email(),
            'phone'=>fake()->PhoneNumber(),
            'company_id' => Companies::factory(),
        ];
    }
}
