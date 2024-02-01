<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $primaryKey = 'lecture_id'; // Add this line

    // Assuming you have these additional fields in your migration
    protected $fillable = [
        'course_id',
        'instructor_id',
        'room_id',
        'period_id',
        'dept_id',
        'year',
        'weekday',  // or 'lecture_date' if you are using specific dates instead of weekdays
        'notes'
    ];
    protected $hidden =[
        'course_id',
        'instructor_id',
        'room_id',
        'period_id',
        'dept_id',
        'updated_at',
        'created_at'
    ];
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id','course_id');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id','instructor_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id','room_id');
    }
    public function period()
    {
        return $this->belongsTo(Period::class, 'period_id','period_id');
    }
    public function scopeWithRelations($query)
    {
        return $query->with('course', 'instructor', 'room', 'period');
    }
}
