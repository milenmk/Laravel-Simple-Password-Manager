<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create(
            'options', function (Blueprint $table) {

            $table->id();
            $table->string('name', 128);
            $table->string('value', 128);
            $table->longText('description')->nullable();
            $table->timestamps();
        }
        );

        DB::table('options')->insert(
            [
                [
                    'name'  => 'PAGINATION_NUM',
                    'value' => 10,
                ],
                [
                    'name'  => 'NUM_LIMIT_ADMIN_DASHBOARD',
                    'value' => 10,
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('options');
    }

};
