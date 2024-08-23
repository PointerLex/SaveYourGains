<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    public function progresses()
    {
        return $this->hasMany(Progress::class);
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
