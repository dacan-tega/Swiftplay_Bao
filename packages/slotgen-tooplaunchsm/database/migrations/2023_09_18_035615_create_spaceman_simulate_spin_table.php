<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpaceManSimulateSpinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slotgen_spaceman_simulate_spin', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->dateTime('spin_date');
            $table->tinyInteger('type')->default(0);
            $table->string('session_id')->nullable();
            $table->decimal('total_bet')->default(0);
            $table->decimal('total_win')->default(0);
            $table->integer('total_spin')->default(0);
            $table->tinyInteger('is_finished')->default(0);
            $table->timestamps();
            // $table->foreign('session_id')->references('uuid')->on('slotgen_player_game')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slotgen_simulate_spin');
    }
}
