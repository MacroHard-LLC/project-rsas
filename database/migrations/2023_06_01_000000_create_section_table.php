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
        Schema::create('section', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('grade_level');
            $table->unsignedBigInteger('adviser_id');
            $table->unsignedBigInteger('schoolyear_id');
            $table->timestamp('added_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('added_by')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();

            $table->foreign('adviser_id')->references('id')->on('user')->where('role', 'adviser');
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
        Schema::dropIfExists('adviser');
    }
};
