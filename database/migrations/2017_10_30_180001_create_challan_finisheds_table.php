<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallanFinishedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
/*    public function up()
    {
        Schema::create('challan_finisheds', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    }*/

    public function up()
    {
        Schema::create('challan_finisheds', function (Blueprint $table) {
            $table->string('id');
             $table->string('name');
             $table->string('weight')->nullable();
            $table->string('quantity');
            $table->string('finished_id');
            $table->string('transport_type')->nullable();
            $table->string('transport_num_plate')->nullable();

             $table->foreign('finished_id')
            ->references('id')
            ->on('finished_goods');
            /*->onDelete('cascade');*/
            

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
        Schema::dropIfExists('challan_finisheds');
    }
}
