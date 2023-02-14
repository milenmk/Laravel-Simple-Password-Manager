<?php

declare(strict_types = 1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Domain;
use App\Models\Record;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 *
 */

/**
 *
 */
class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = User::factory(5)->create(
            [
                'password' => Hash::make('123456'),
            ]
        );

        foreach ($user as $usrtmp) {
            $domain = Domain::factory(5)->create(
                [
                    'user_id' => $usrtmp->id,
                ]
            );

            foreach ($domain as $domaintmp) {
                Record::factory(5)->create(
                    [
                        'domain_id' => $domaintmp->id,
                        'user_id'   => $usrtmp->id,
                    ]
                );
            }
        }
    }

}
