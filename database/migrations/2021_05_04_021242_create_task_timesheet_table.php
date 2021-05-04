<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTimesheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_timesheet', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('timesheet_id');
            $table->foreign('task_id')
                    ->references('id')->on('tasks')
                    ->onDelete('cascade'); 
            $table->foreign('timesheet_id')
                    ->references('id')->on('timesheets')
                    ->onDelete('cascade');
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
        Schema::table('task_timesheet', function (Blueprint $table) {
            $table->dropForeign('task_timesheet_task_id_foreign');
            $table->dropForeign('task_timesheet_timesheet_id_foreign');
        });
        Schema::dropIfExists('task_timesheet');
    }
}
