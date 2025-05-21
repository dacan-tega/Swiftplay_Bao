<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGameStateToSlotgenSpaceManPlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slotgen_spaceman_player', function (Blueprint $table) {
            $table->boolean('previous_session')->default(false);
            $table->json('game_state')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slotgen_spaceman_player', function (Blueprint $table) {
            $table->dropColumn(['previous_session', 'game_state']);
        });
    }
}
