<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sport_events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('organisation')->nullable();
            $table->string('location')->nullable();
            $table->dateTime('start_date_at');
            $table->integer('status')->default(0);
            $table->decimal('price', 8, 2)->default(0);
            $table->timestamps();
        });

        DB::table('sport_events')->insert([
            ['name' => 'BuguluTrail 2026', 'organisation' => 'Sport', 'location' => 'Каркаралинск', 'start_date_at' => '2026-06-07', 'status' => 1],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sport_events');
    }
};
