<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuildPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('papers', function (Blueprint $table) {
            $table->bigIncrements('paper_id');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->string('paper_name')->nullable()->default("Paper 1");
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
        //
        Schema::dropIfExists('papers');
    }
}
