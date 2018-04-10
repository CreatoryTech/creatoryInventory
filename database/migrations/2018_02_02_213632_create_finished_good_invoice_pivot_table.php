<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinishedGoodInvoicePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finished_good_invoice', function (Blueprint $table) {
            $table->string('finished_good_id')->index();
            $table->foreign('finished_good_id')->references('id')->on('finished_goods')->onDelete('cascade');
            $table->integer('invoices_id')->unsigned()->index();
            $table->foreign('invoices_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->primary(['finished_good_id', 'invoices_id'], 'finished_invoice_primary');
             $table->integer('quantity')->unsigned();
             $table->integer('price')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('finished_good_invoice');
    }
}
