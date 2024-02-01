<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id('lecture_id');
            $table->foreignId('course_id')->constrained('courses', 'course_id');
            $table->foreignId('instructor_id')->constrained('instructors', 'instructor_id');
            $table->foreignId('room_id')->constrained('rooms', 'room_id');
            $table->foreignId('period_id')->constrained('periods', 'period_id');
            $table->foreignId('dept_id')->constrained('departments', 'dept_id');
            $table->enum('year', ['First', 'Second', 'Third', 'Fourth']); // Adding the year field
            $table->string('weekday'); // or $table->date('lecture_date') for specific dates
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectures');
    }
};
