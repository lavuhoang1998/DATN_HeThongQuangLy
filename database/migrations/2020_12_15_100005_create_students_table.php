<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('MSHS');
            $table->string('sex');
            $table->date('date_of_birth')->comment('YYYY-MM-DD');
            $table->string('dia_chi', 255);
            $table->string('sdt');
            $table->string('que_quan', 255);
            $table->string('dan_toc');
            $table->string('ton_giao');
            $table->string('avt');
            $table->timestamps();
            $table->softDeletes();
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
}
