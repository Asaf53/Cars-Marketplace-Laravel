<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manufacturer extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $fillable = [
        'brand',
        'model_id'
    ];

    public function cars()
    {
        return $this->hasMany(cars::class, 'manufacturer_id');
    }
}
