<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'Condition'
    ];

    public function cars()
    {
        return $this->hasMany(cars::class, 'condition_id');
    }
}
