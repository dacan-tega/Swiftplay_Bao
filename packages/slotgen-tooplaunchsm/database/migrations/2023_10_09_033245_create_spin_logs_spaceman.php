<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpinLogsSpaceMan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slotgen_spaceman_spinlogs', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->decimal('credit', 18, 2)->nullable();
            $table->decimal('total_bet')->nullable();
            $table->decimal('win_amount')->nullable();
            $table->string('transaction')->nullable();
            $table->integer('step')->nullable();
            $table->string('pos')->nullable();
            $table->string('player_pos')->nullable();
            $table->string('player_id')->nullable();
            $table->timestamps();
            $table->foreign('player_id')->references('uuid')->on('slotgen_spaceman_player')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slotgen_spaceman_spinlogs');
    }
}
