<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carsImages extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'car_id',
        'image'
    ];

    public function car()
    {
        return $this->belongsToMany(cars::class);
    }
}
