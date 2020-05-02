<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->longText('address');
            $table->string('contact');
            $table->string('email');
            $table->longText('notes')->nullable();
            $table->string('delivery_method');
            $table->string('is_claimed')->default('N');
            $table->string('is_delivered')->default('N');
            $table->timestamps();
        });
          DB::statement('ALTER TABLE orders CHANGE id id INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
