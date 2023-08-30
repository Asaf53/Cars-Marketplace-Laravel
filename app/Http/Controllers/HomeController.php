<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\carsImages;
use App\Models\year;
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
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $manufacturer = DB::table("manufacturers")->orderBy('brand', 'asc')->pluck('brand', 'id');
        $color = DB::table("colors")->orderBy('color', 'asc')->pluck('color', 'id');
        $bodystyle = DB::table("bodystyles")->orderBy('id', 'asc')->pluck('style', 'id');
        $condition = DB::table("conditions")->orderBy('condition', 'asc')->pluck('Condition', 'id');
        $year = DB::table("years")->orderBy('id', 'asc')->pluck('year', 'id');
        $fuel = DB::table("fuels")->orderBy('fuel', 'asc')->pluck('fuel', 'id');
        $gearbox = DB::table("gearboxes")->orderBy('gearbox', 'asc')->pluck('gearbox', 'id');
        $registration = DB::table("registrations")->orderBy('registration', 'asc')->pluck('registration', 'id');
        $state = DB::table("states")->orderBy('state', 'asc')->pluck('state', 'id');


        $query = Cars::query();

        $manufacturers = $request->input('Manufacturer');
        $models = $request->input('Model');
        $colors = $request->input('Color');
        $bodystyles = $request->input('Bodystyle');
        $conditions = $request->input('Condition');
        $YearFrom = $request->input('YearFrom');
        $YearTo = $request->input('YearTo');
        $KmFrom = $request->input('KmFrom');
        $KmTo = $request->input('KmTo');
        $fuels = $request->input('Fuel');
        $gearboxs = $request->input('Gearbox');
        $registrations = $request->input('Registration');
        $states = $request->input('State');

        if ($manufacturers) {
            $query->where('manufacturer_id', '=', $manufacturers);
        }
        if ($models) {
            $query->where('model_id', '=', $models);
        }
        if ($colors) {
            $query->where('color_id', '=', $colors);
        }
        if ($bodystyles) {
            $query->where('bodystyle_id', '=', $bodystyles);
        }
        if ($conditions) {
            $query->where('condition_id', '=', $conditions);
        }
        if ($YearTo && $YearFrom) {
            $query->whereBetween('year_id', [$YearTo, $YearFrom]);
        }
        if ($KmTo && $KmFrom) {
            $query->whereBetween('mileage', [$KmFrom, $KmTo]);
        }
        if ($fuels) {
            $query->where('fuel_id', '=', $fuels);
        }
        if ($gearboxs) {
            $query->where('gearbox_id', '=', $gearboxs);
        }
        if ($registrations) {
            $query->where('registration_id', '=', $registrations);
        }
        if ($states) {
            $query->where('state_id', '=', $states);
        }
        if ($request->has('sort')) {
            $sort = $request->input('sort');

            // Apply sorting based on the provided parameter
            switch ($sort) {
                case 'price_asc':
                    $query->orderBy('price');
                    break;
                case 'price_desc':
                    $query->orderByDesc('price');
                    break;
                case 'mileage_asc':
                    $query->orderBy('mileage');
                    break;
                case 'mileage_desc':
                    $query->orderByDesc('mileage');
                    break;
                case 'year_asc':
                    $query->orderBy('year_id');
                    break;
                case 'year_desc':
                    $query->orderByDesc('year_id');
                    break;
                case 'listing_asc':
                    $query->orderBy('created_at');
                    break;
                case 'listing_desc':
                    $query->orderByDesc('created_at');
                    break;
                default:
                    // Handle any unsupported sort option
                    break;
            }
        }
        $cars = $query->orderByDesc('created_at')->get();
        $count = $query->count('*');
        // dd($request->all());
        // dd($cars);
        // $cars = Cars::all();
        return view('home', compact('cars', 'count', 'manufacturer', 'color', 'bodystyle', 'condition', 'year', 'fuel', 'gearbox', 'registration', 'state'));
    }
    public function modelss($id)
    {
        $models = DB::table("models")
            ->where("manufacturer_id", $id)
            ->orderBy('name', 'asc')
            ->pluck('name', 'id');
        return json_encode($models);
    }
}
