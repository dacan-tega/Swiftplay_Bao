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
        Schema::create('slotgen_aztec_spin_logs', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->tinyInteger('free_num')->default(0);
            $table->tinyInteger('num_line')->default(0);
            $table->decimal('betamount', 18, 2);
            $table->decimal('balance', 18, 2);
            $table->decimal('credit_line', 18, 2);
            $table->decimal('total_bet', 18, 2);
            $table->decimal('win_amount', 18, 2);
            $table->longText('active_icons');
            $table->longText('active_lines');
            $table->longText('icon_data');
            $table->string('spin_ip');
            $table->tinyInteger('multipy')->default(0);
            $table->longText('win_log');
            $table->string('transaction_id');
            $table->longText('drop_line');
            $table->integer('total_way')->default(0);
            $table->string('first_drop');
            $table->string('is_free_spin');
            $table->string('parent_id')->default(0);
            $table->tinyInteger('drop_normal')->default(0);
            $table->tinyInteger('drop_feature')->default(0);
            $table->string('mini_win');
            $table->string('mini_result');
            $table->string('multiple_list');
            $table->json('result_json')->nullable();
            $table->string('player_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slotgen_aztec_spin_logs');
    }
};
