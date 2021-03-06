<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeyToClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id')->comment('GVCN');;
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->unsignedBigInteger('semester_id')->comment('năm vào học');;
            $table->foreign('semester_id')->references('id')->on('semesters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->dropForeign('classes_teacher_id_foreign');
            $table->dropForeign('classes_semester_id_foreign');
        });
    }
}
