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
        'mode',
        'routine_id',
        'rest',  // Agregar este campo para permitir la asignación masiva
    ];

    public function routine()
    {
        return $this->belongsTo(Routine::class);
    }

    public function sets()
    {
        return $this->hasMany(Set::class);
    }
}
