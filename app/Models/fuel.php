<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fuel extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'fuel'
    ];

    public function cars()
    {
        return $this->hasMany(cars::class, 'fuel_id');
    }
}
