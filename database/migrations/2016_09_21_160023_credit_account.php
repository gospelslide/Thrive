<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreditAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('credit_account', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('description');
            $table->string('customer_id');
            $table->string('bank_id');
            $table->string('card_number');
            $table->string('display_name');
            $table->double('max_spend',15,2);
            $table->double('current_balance',15,2);
            $table->string('type');
            $table->date('expiry_date');
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
