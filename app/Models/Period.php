<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Period extends Model
{
    use HasFactory;

    protected $fillable = ['start_time', 'end_time'];

    public function lectures()
    {
        return $this->hasMany(Lecture::class, 'period_id');
    }

        // Accessor for formatted start_time
    public function getFormattedStartTimeAttribute()
    {
        return Carbon::parse($this->attributes['start_time'])->format('H:i');
    }

    // Accessor for formatted end_time
    public function getFormattedEndTimeAttribute()
    {
        return Carbon::parse($this->attributes['end_time'])->format('H:i');
    }
}
