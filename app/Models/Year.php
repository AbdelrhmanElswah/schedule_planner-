<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;


    protected $fillable = [
        'year'
    ];

    // Add relationships if needed, e.g., lectures or courses specific to a year
}
