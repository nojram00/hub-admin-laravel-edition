<?php

use App\Models\Category;
use App\Models\Processor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->integer('item_qty');
            $table->float('single_price');
            $table->float('bundle_price');
            $table->binary('image_data')->nullable();
            $table->string('data_string', 2000)->nullable();
            $table->foreignIdFor(Category::class)->constrained();
            $table->foreignIdFor(Processor::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
