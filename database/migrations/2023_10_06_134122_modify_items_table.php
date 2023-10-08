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
        // Schema::table('items', function (Blueprint $table) {
        //     $table->longBinary('image_data')->change();
        // });
        DB::statement('ALTER TABLE items MODIFY COLUMN image_data LONGBLOB');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('items', function (Blueprint $table) {
        //     $table->binary('image_data')->change();
        // });
    }
};
