<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('sku')->nullable();
            $table->string('image')->nullable();
            $table->string('price')->default(0);
            $table->string('discount')->default(0);
            $table->string('unit_type')->default('Piece')->comment('KG,Meter,Piece,Litre,Gram');
            $table->integer('category_id')->default(null);
            $table->boolean('is_active')->comment('1-active,0-inactive')->default(1);
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
        Schema::dropIfExists('product');
    }
}
