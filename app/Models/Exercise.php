<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'set_amount',
        'rep_amount',
        'weight',
        'mode',
        'routine_id'
    ];

    public function routine()
    {
        return $this->belongsTo(Routine::class);
    }
}
