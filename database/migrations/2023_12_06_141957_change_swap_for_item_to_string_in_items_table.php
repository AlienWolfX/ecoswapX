<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/YYYY_MM_DD_change_swap_for_item_to_string_in_items_table.php
public function up()
{
    Schema::table('items', function (Blueprint $table) {
        $table->string('swap_for_item')->nullable();
        $table->dropForeign(['swap_for_item_id']);
        $table->dropColumn('swap_for_item_id');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            //
        });
    }
};
