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
        Schema::create('schoolyear', function (Blueprint $table) {
            $table->increments('id');
            $table->year('start_year');
            $table->year('end_year');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamp('added_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('added_by')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->boolean('is_deleted')->default(false);
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
        Schema::dropIfExists('schoolyear');
    }
};
