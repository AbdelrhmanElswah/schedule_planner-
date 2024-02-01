<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $primaryKey = 'instructor_id';

    // Assuming your instructors table includes these fields
    protected $fillable = [
        'instructor_name',
    ];
    protected $hidden =[
        'updated_at',
        'created_at'
    ];
    public function department()
    {
    return $this->belongsTo(Department::class, 'dept_id');
    }


    /**
     * Get the lectures associated with the instructor.
     */
    public function lectures()
    {
        return $this->hasMany(Lecture::class, 'instructor_id');
    }

    // Add any other necessary relationships or functions here
}
