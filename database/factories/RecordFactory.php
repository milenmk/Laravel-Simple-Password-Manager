<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $array = ['database', 'ftp', 'website'];

        return [
            'type' => $array[rand(0,2)],
            'url' => fake()->domainName(),
            'username' => fake()->userName(),
            'password' => Hash::make(Str::random())
        ];
    }
}
