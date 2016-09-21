<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SavingAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saving_account', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('description');
            $table->string('customer_id');
            $table->string('bank_id');
            $table->string('sort_code');
            $table->double('balance',15,2);
            $table->decimal('rate_of_interest',2,2);
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
