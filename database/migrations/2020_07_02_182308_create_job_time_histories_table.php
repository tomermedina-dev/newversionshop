<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTimeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_time_histories', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('assignment_id');
            $table->string('job_id');
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
        });
          DB::statement('ALTER TABLE job_time_histories CHANGE id id INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_time_histories');
    }
}
