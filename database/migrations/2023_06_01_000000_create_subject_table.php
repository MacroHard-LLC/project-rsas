<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('section_id');
            $table->string('instructor_id');
            $table->unsignedBigInteger('machine_id');
            $table->unsignedBigInteger('schoolyear_id');
            $table->string('semester');
            $table->timestamp('added_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('added_by')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();

            $table->foreign('section_id')->references('id')->on('section');
            $table->foreign('instructor_id')->references('rfid_number')->on('instructor');
            $table->foreign('machine_id')->references('id')->on('machine');
            $table->foreign('schoolyear_id')->references('id')->on('schoolyear');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject');
    }
};
