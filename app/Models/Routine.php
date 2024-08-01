<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function progresses()
    {
        return $this->hasMany(Progress::class);
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }
}
