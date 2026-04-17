<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('ALTER SEQUENCE orders_id_seq RESTART WITH 60');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
