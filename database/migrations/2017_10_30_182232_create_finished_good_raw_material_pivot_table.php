<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinishedGoodRawMaterialPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finished_good_raw_material', function (Blueprint $table) {
/*            $table->integer('finished_good_id')->unsigned()->index();

*/  
        $table->string('finished_good_id')->index();

        $table->string('raw_material_id')->index();

        $table->foreign('finished_good_id')->references('id')->on('finished_goods')->onDelete('cascade');
/*            $table->integer('raw_material_id')->unsigned()->index();
*/      $table->foreign('raw_material_id')->references('id')->on('raw_materials')->onDelete('cascade');
        $table->primary(['finished_good_id', 'raw_material_id'] , 'finished_raw_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('finished_good_raw_material');
    }
}
