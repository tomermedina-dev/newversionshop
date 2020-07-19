<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackJobChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('back_job_checklists', function (Blueprint $table) {
            $table->id();
            $table->string('warranty_id')->nullable();
            $table->string('job_order_id_reference')->nullable();
            $table->string('new_checklist_id')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
        });
          DB::statement('ALTER TABLE back_job_checklists CHANGE id id INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('back_job_checklists');
    }
}
