<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class year extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'year'
    ];

    public function cars()
    {
        return $this->hasMany(cars::class, 'year_id');
    }
}
