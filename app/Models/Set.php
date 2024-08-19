<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;

    protected $fillable = [
        'rep_amount',
        'weight',
        'exercise_id'
    ];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
