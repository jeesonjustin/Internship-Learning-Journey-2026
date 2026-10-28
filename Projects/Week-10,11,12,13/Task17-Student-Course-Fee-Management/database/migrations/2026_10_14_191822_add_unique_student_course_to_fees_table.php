<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueStudentCourseToFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('fees', function (Blueprint $table) {
        $table->unique(
            ['student_id', 'course_id'],
            'fees_student_course_unique'
        );
    });
}

public function down()
{
    Schema::table('fees', function (Blueprint $table) {
        $table->dropUnique('fees_student_course_unique');
    });
}
}
