<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('job_order_id');
            $table->string('client_id');
            $table->string('client_name');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->longText('notes')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE invoices CHANGE id id INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
