<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_product', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id')->default(null);
            $table->integer('product_id')->default(null);
            $table->string('product_name')->default('Cash')->comment('Cash,Online,Cheque');
            $table->bigInteger('quantity')->default(0);
            $table->bigInteger('price')->default(0.00);
            $table->bigInteger('total')->default(0.00);
            $table->softDeletes();
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
        Schema::dropIfExists('invoice_product');
    }
}
