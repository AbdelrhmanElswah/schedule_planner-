<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $primaryKey = 'room_id';

    protected $fillable = [
        'room_name'
    ];
    protected $hidden =[
        'updated_at',
        'created_at'
    ];
    public function lectures()
    {
        return $this->hasMany(Lecture::class, 'room_id');
    }
}
