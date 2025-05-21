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
        Schema::table('slotgen_fortune_dragon_configs', function (Blueprint $table) {
            $table->string('value_buy_feature')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('slotgen_fortune_dragon_configs', function (Blueprint $table) {
            $table->dropColumn('value_buy_feature');
        });
    }
};
