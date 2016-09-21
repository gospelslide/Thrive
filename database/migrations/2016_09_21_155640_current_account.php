<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CurrentAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('current_account', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('description');
            $table->string('customer_id');
            $table->string('bank_id');
            $table->string('sort_code');
            $table->double('net_balance',15,2);
            $table->double('od_limit',10,2);
            $table->string('card_number');
            $table->string('display_name');
            $table->double('max_spend',15,2);
            $table->double('current_balance',15,2);
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
