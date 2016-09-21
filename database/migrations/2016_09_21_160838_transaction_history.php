<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransactionHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('transaction_history', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('customer_id');
            $table->string('account_id');
            $table->string('account_type');
            $table->string('description');
            $table->string('address');
            $table->string('country');
            $table->string('merchant_name')->nullable();
            $table->string('merchant_id')->nullable();
            $table->string('payment_mode');
            $table->double('money_in',15,2)->nullable();
            $table->double('money_out',15,2)->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
