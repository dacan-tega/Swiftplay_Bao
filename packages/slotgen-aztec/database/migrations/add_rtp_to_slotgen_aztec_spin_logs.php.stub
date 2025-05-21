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
        Schema::table('slotgen_aztec_spin_logs', function (Blueprint $table) {
            $table->string('rtp_file')->nullable();
            $table->string('rtp_index')->nullable();
            $table->string('rtp_key')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('slotgen_aztec_spin_logs', function (Blueprint $table) {
            $table->dropColumn('rtp_file');
            $table->dropColumn('rtp_index');
            $table->dropColumn('rtp_key');
        });
    }
};
