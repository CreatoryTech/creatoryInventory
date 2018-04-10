<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('clients_id');
            $table->unsignedInteger('total_paid');
            $table->unsignedInteger('total_due');



            $table->timestamps();
             $table->foreign('clients_id')
            ->references('id')
            ->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_payments');
    }
}
