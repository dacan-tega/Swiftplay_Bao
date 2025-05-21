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
        Schema::create('config_agents', function (Blueprint $table) {
            $table->id();
            $table->string("game_name");
            $table->string("game_code");
            $table->string("agent_id");
            $table->string("bet_size");
            $table->string("bet_level");
            $table->string("base_bet");
            $table->decimal('min_bet', 18, 2)->nullable();
            $table->decimal('max_bet', 18, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config_agents');
    }
};
