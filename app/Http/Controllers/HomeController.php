<?php

namespace App\Http\Controllers;

use App\Models\cars;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cars = cars::select(
            'cars.*',
            'manufacturers.id',
            'manufacturers.brand',
            'models.id',
            'models.name',
            'users.id',
            'users.name',
            'users.email',
            'colors.color',
            'conditions.Condition',
            'bodystyles.style',
            'years.year',
            'fuels.fuel',
            'gearboxes.gearbox',
            'registrations.registration',
            'states.state',
            DB::raw('models.name AS model'),
        )->join('manufacturers', 'cars.manufacturer_id', '=', 'manufacturers.id')
            ->join('models', 'cars.model_id', '=', 'models.id')
            ->join('colors', 'cars.color_id', '=', 'colors.id')
            ->join('conditions', 'cars.condition_id', '=', 'conditions.id')
            ->join('bodystyles', 'cars.bodystyle_id', '=', 'bodystyles.id')
            ->join('years', 'cars.year_id', '=', 'years.id')
            ->join('fuels', 'cars.fuel_id', '=', 'fuels.id')
            ->join('gearboxes', 'cars.gearbox_id', '=', 'gearboxes.id')
            ->join('registrations', 'cars.registration_id', '=', 'registrations.id')
            ->join('states', 'cars.state_id', '=', 'states.id')
            ->join('users', 'cars.user_id', '=', 'users.id')->get();
        // dd($cars);
        return view('home', compact('cars'));
    }
}
