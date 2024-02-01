<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $primaryKey = 'course_id';


    protected $fillable = [
        'course_name',
        'dept_id'
    ];

    protected $hidden =[
        'dept_id',
        'updated_at',
        'created_at'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id','dept_id');
    }

    
    public function lectures()
    {
        return $this->hasMany(Lecture::class,'course_id');
    }
}
