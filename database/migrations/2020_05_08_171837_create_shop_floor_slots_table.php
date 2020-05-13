<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopFloorSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_floor_slots', function (Blueprint $table) {
            $table->id();
            $table->string('slot_name');
            $table->longText('description')->nullable();
            $table->string('color_code');
            $table->string('status');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE shop_floor_slots CHANGE id id INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_floor_slots');
    }
}
