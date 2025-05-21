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
        Schema::create('slotgen_aztec_players', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->decimal('credit', 18, 2);
            $table->string('client_ip');
            $table->string('device_info');
            $table->dateTime('last_login');
            $table->timestamps();
            $table->string('user_name');
            $table->json('session_data');
            $table->boolean('is_seamless');
            $table->decimal('nextrun_feature', 18, 2);
            $table->decimal('return_feature', 18, 2);
            $table->decimal('return_normal', 18, 2);
            $table->string('player_uuid')->nullable();
            $table->string('agent_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slotgen_aztec_players');
    }
};
