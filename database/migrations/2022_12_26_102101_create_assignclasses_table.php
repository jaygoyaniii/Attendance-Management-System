<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignclasses', function (Blueprint $table) {
            $table->id('assignClassId');
            $table->unsignedBigInteger('classId');
            $table->foreign('classId')->references('classId')->on('classes');
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('faculties');
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
        Schema::dropIfExists('assignclasses');
    }
};
