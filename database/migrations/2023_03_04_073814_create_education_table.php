<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('career')->nullable()->default('Computer Science');
            $table->string('role_model')->nullable()->default('Bill Gates');
            $table->integer('target_points')->nullable()->default(20);
            $table->string('target_university')->nullable()->default('University of Nairobi');
            $table->string('university_cutoff')->nullable()->default('30.2');
            $table->foreignId('user_id')->nullable();
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
        Schema::dropIfExists('education');
    }
}
