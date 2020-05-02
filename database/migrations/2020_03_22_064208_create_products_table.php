<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('type_id');
            $table->string('name');
            $table->string('brand')->nullable();
            $table->string('car_brand')->nullable();
            $table->string('car_model')->nullable();
            $table->longText('description')->nullable();
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('status');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE products CHANGE id id INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
