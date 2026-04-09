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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sport_event_id');
            $table->foreign('sport_event_id')->references('id')->on('sport_events');
            $table->unsignedBigInteger('sport_event_distance_id');
            $table->foreign('sport_event_distance_id')->references('id')->on('sport_event_distances');
            $table->decimal('price', 8, 2)->default(0);
            $table->timestampTz('paid_at')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->smallInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
