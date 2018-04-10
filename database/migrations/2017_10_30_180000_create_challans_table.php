<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challans', function (Blueprint $table) {
            $table->string('id');
             $table->string('name');
             $table->string('weight')->nullable();
            $table->string('quantity');
            $table->string('raw_id');
            $table->string('transport_type')->nullable();
            $table->string('transport_num_plate')->nullable();

             $table->foreign('raw_id')
            ->references('id')
            ->on('raw_materials');
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
        Schema::dropIfExists('challans');
    }
}
