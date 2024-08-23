<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('from_account');
            $table->bigInteger('to_account');
            $table->decimal('amount', 10, 2);
            $table->timestamp('transaction_date');
            $table->enum('status', ['pending', 'completed', 'failed']);
            $table->string('payment_service');
            $table->timestamps();

            $table->foreign('from_account')->references('account_number')->on('accounts')->onDelete('cascade');
            $table->foreign('to_account')->references('account_number')->on('accounts')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
