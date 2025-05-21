<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionQrcodeTable extends Migration
{
    public function up()
    {
        Schema::create('transaction_qrcode', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('mode'); // payout | deposit
            $table->decimal('amount', 16, 2)->default(0);
            $table->string('qr_data')->nullable();
            $table->string('status')->default('pending'); // pending | completed | failed
            $table->timestamp('scanned_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction_qrcode');
    }
}