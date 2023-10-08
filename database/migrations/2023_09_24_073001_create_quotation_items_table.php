<?php

use App\Models\Item;
use App\Models\Quotation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quotation_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Item::class)->constrained(); // for item
            $table->integer('qi_count'); // gaano karami yung nilagay
            $table->foreignIdFor(Quotation::class)->constrained(); // anong quoation id nya
        });

        // modify:
        // Schema::table('quotation_items', function (Blueprint $table) {
        //     // $table->
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('quotation_items');
    }
};
