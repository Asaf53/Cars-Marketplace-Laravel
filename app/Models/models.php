<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class models extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'model'
    ];

    public function cars()
    {
        return $this->hasMany(cars::class, 'model_id');
    }
}
