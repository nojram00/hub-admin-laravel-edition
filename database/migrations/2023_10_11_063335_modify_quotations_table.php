<?php

use App\Models\Quotation;
use App\Models\Item;
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
        // Schema::beginTransaction();
        // try{

        //     Schema::commit();
        // }catch(Exception $e){
        //     Schema::rollback();
        // }

        Schema::table('quotation_items', function(Blueprint $table){
            $table->dropForeign('item_id');
            $table->dropForeign('quotation_id');
        });


        // Schema::table('quotation_items', function(Blueprint $table){
        //     $table->foreignIdFor(Item::class)->constrained()->cascadeOnDelete();
        //     $table->foreignIdFor(Quotation::class)->constrained()->cascadeOnDelete();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quotation_items', function(Blueprint $table){
            $table->dropForeign('item_id');
            $table->dropForeign('quotation_id');
        });
    }
};
