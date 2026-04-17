<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sport_event_distances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sport_event_id');
            $table->foreign('sport_event_id')->references('id')->on('sport_events');
            $table->string('name');
            $table->integer('slots')->default(0);
            $table->text('description')->nullable();
            $table->string('distance');
            $table->decimal('price', 8, 2)->default(0);
            $table->smallInteger('status')->default(0);
            $table->timestamps();
        });

        DB::table('sport_event_distances')->insert([
            [
                'sport_event_id' => 1,
                'name' => 'Bugyly Ultra Trail',
                'slots' => 100,
                'distance' => '50 km +',
                'description' => 'около 50 км, от 18 лет, 5 пунктов питания, набор высоты ~996 м;',
                'price' => 21500,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sport_event_id' => 1,
                'name' => 'Bugyly Forest Trail',
                'slots' => 250,
                'distance' => '21 km +',
                'description' => 'около 21 км, от 18 лет, 2 пункта питания, набор высоты ~ 500 м;',
                'price' => 19000,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sport_event_id' => 1,
                'name' => 'Shaitankol Trail',
                'slots' => 320,
                'distance' => '10 km +',
                'description' => 'около 10 км, от 18 лет, 1 пункт питания, набор высоты ~300м;',
                'price' => 14000,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sport_event_id' => 1,
                'name' => 'Young trail',
                'slots' => 50,
                'distance' => '5 km',
                'description' => 'подростки (13-17), набор высоты - 30м;',
                'price' => 5000,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sport_event_id' => 1,
                'name' => 'Kids trail',
                'slots' => 30,
                'distance' => '1 km',
                'description' => 'детский забег (9-12), набор высоты -10м;',
                'price' => 3000,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sport_event_id' => 1,
                'name' => 'Nordic Walking',
                'slots' => 50,
                'distance' => '10 km +',
                'description' => 'Скандинавская ходьба, около 10 км, от 18 лет, 1 пункт питания, набор высоты ~300м;',
                'price' => 12000,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sport_event_distances');
    }
};
