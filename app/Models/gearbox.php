<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gearbox extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'gearbox'
    ];

    public function cars()
    {
        return $this->hasMany(cars::class, 'gearbox_id');
    }
}
