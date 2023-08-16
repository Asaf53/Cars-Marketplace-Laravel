<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'state'
    ];

    public function cars()
    {
        return $this->hasMany(cars::class, 'state_id');
    }
}
