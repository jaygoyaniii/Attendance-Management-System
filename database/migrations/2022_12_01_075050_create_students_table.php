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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name',60);
            $table->string('email',60)->unique();
            $table->bigInteger('enrollment_no');
            $table->date('dob',15);
            $table->bigInteger('mobile_no');
            $table->string('gender',6);
            $table->text('address');
            $table->string('class',6);
            $table->string('course',30);
            $table->string('semester',2);
            $table->tinyInteger('presentAttendance')->default(0);
            $table->tinyInteger('totalAttendance')->default(0);
            $table->tinyInteger('avgAttendance')->default(0);
            $table->string('is_deleted',6)->default('false');
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
        Schema::dropIfExists('students');
    }
};
