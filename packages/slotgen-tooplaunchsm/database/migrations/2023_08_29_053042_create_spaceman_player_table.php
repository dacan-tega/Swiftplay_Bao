<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpaceManPlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slotgen_spaceman_player', function (Blueprint $table) {
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
            $table->string('player_uuid')->nullable();
            $table->string('agent_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slotgen_spaceman_player');
    }
}
