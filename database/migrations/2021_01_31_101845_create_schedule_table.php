<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('schedules')==false) {
            Schema::create('schedules', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id');
                $table->date('day_of_month');
                $table->bigInteger('mode_codes_id');
                $table->timestamps();
            });


        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
