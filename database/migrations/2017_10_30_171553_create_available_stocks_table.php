<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailableStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('availableref_id');         
            $table->string('availableref_type');
            $table->unsignedInteger('total')->nullable();
            $table->unsignedInteger('totalOutlet')->nullable();
         
           
            
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
        Schema::dropIfExists('available_stocks');
    }
}
