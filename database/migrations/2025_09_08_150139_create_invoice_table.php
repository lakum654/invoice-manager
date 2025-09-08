<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_number')->default(null);
            $table->integer('customer_id')->default(null);
            $table->unsignedBigInteger('user_id')->nullable()->comment('Admin who created the invoice');
            $table->bigInteger('total')->default(0.00);
            $table->bigInteger('total_discount')->default(0.00);
            $table->bigInteger('total_charge')->default(0.00);
            $table->boolean('is_paid')->comment('1-yes,0-no')->default(1);
            $table->string('payment_type')->default('Cash')->comment('Cash,Online,Cheque,Other');
            $table->longText('description')->nullable();
            $table->dateTime('invoice_datetime')->nullable()->comment('Invoice Date & Time');
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
        Schema::dropIfExists('invoice');
    }
}
