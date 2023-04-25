<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cars extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'manufacturer_id',
        'model_id',
        'bodystyle_id',
        'color_id',
        'condition_id',
    ];

    public function model()
    {
        return $this->belongsToMany(models::class);
    }

    public function manufacturer()
    {
        return $this->belongsToMany(manufacturer::class);
    }

    public function BodyStyle()
    {
        return $this->belongsToMany(BodyStyle::class);
    }

    public function Color()
    {
        return $this->belongsToMany(Color::class);
    }

    public function Condition()
    {
        return $this->belongsToMany(Condition::class);
    }
    public function Year()
    {
        return $this->belongsToMany(year::class);
    }
}
