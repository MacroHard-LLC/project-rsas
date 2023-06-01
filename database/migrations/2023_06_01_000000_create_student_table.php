<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student', function (Blueprint $table) {
            $table->string('rfid')->primary();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('added_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('added_by')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('section_id')->references('id')->on('section');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
