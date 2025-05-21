<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('slotgen_gates_of_olympus_configs', function (Blueprint $table) {
            $table->id();

            $table->smallInteger('win_ratio')->default(50);
            $table->smallInteger('feature_ratio')->default(50);
            $table->smallInteger('feature_winvalue')->default(50);
            $table->smallInteger('system_rtp')->default(50);
            $table->boolean('use_rtp')->default(false);
            $table->smallInteger('sign_feature_spin')->default(50);
            $table->smallInteger('sign_feature_credit')->default(0);
            $table->smallInteger('sign_bonus')->default(0);
            $table->tinyInteger('jackpot_return_value_ratio')->default(0);
            $table->tinyInteger('jackpot_win_ratio')->default(0);
            $table->decimal('jackpot_value', 18, 3);         
            $table->longtext('bet_size')->default(null);
            $table->string('base_bet')->nullable();
            $table->string('bet_level')->nullable();
            $table->integer('max_bet')->default(50);
            $table->string('currency')->nullable();
            $table->string('currency_prefix')->nullable();
            $table->string('currency_suffix')->default(0);
            $table->string('currency_thousand')->nullable();
            $table->string('currency_decimal')->default(0);
            $table->longtext('game_name')->default(null);

            $table->timestamps();
        });

        DB::table('slotgen_gates_of_olympus_configs')->insert(
            [
                'win_ratio' => 50,
                'feature_ratio' => 50,
                'feature_winvalue' => 50,
                'system_rtp' => 97,
                'use_rtp' => true,
                'sign_feature_spin' => 50,
                'sign_feature_credit' => 50,
                'sign_bonus' => 50,
'jackpot_value' => 20,
                'jackpot_win_ratio' => 0,
                'jackpot_return_value_ratio' => 0,
                'game_name' => '',                
                'bet_size' =>  "0.2,2,20,100",
                'bet_level' => "1,2,3,4,5,6,7,8,9,10",
                'base_bet' => 20,
                'max_bet' => 500,
                'currency' => 'USD',
                'currency_prefix' => '$',
                'currency_suffix' => '',
                'currency_thousand' => ',',
                'currency_decimal' => '.',
            ]
            );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slotgen_gates_of_olympus_configs');
    }
};
