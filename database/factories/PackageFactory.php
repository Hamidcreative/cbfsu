<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Package>
 */
final class PackageFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Package::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'name' => fake()->optional()->name,
            'amount' => fake()->optional()->word,
            'is_active' => fake()->boolean,
        ];
    }
}
