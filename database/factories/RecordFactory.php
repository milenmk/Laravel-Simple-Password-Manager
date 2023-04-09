<?php

declare(strict_types = 1);

namespace Database\Factories;

use App\Http\Controllers\RecordController;
use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Record>
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
            'type'     => $array[rand(0, 2)],
            'url'      => fake()->domainName(),
            'username' => fake()->userName(),
            'password' => (new RecordController())->encryptPassword(Str::random()),
        ];
    }

}
