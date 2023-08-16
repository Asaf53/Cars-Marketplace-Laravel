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

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function models()
    {
        return $this->belongsTo(models::class, 'model_id');
    }

    public function manufacturers()
    {
        return $this->belongsTo(manufacturer::class, 'manufacturer_id');
    }

    public function bodystyles()
    {
        return $this->belongsTo(Bodystyle::class, 'bodystyle_id');
    }

    public function colors()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function conditions()
    {
        return $this->belongsTo(Condition::class, 'condition_id');
    }
    public function years()
    {
        return $this->belongsTo(year::class, 'year_id');
    }
    public function gearboxs()
    {
        return $this->belongsTo(gearbox::class, 'gearbox_id');
    }
    public function fuels()
    {
        return $this->belongsTo(fuel::class, 'fuel_id');
    }
    public function registrations()
    {
        return $this->belongsTo(registration::class, 'registration_id');
    }
    public function states()
    {
        return $this->belongsTo(state::class, 'state_id');
    }
    public function images()
    {
        return $this->hasMany(carsImages::class, 'car_id');
    }
}
