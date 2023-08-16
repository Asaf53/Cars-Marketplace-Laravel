<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodystyle extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'Bodystyle'
    ];

    public function cars()
    {
        return $this->hasMany(cars::class, 'bodystyle_id');
    }
}
