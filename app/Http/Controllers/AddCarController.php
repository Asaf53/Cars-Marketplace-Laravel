<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\manufacturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddCarController extends Controller
{
    public function index()
    {
        $manufacturer = DB::table("manufacturers")->pluck('brand', 'id');
        $color = DB::table("colors")->pluck('color', 'id');
        $bodystyle = DB::table("bodystyles")->pluck('style', 'id');
        $condition = DB::table("conditions")->pluck('Condition', 'id');
        $year = DB::table("years")->pluck('year', 'id');
        $fuel = DB::table("fuels")->pluck('fuel', 'id');
        $gearbox = DB::table("gearboxes")->pluck('gearbox', 'id');
        $registration = DB::table("registrations")->pluck('registration', 'id');
        $state = DB::table("states")->pluck('state', 'id');
        return view('addcar', compact('manufacturer', 'color', 'bodystyle', 'condition', 'year', 'fuel', 'gearbox', 'registration', 'state'));
    }

    public function modelss($id)
    {
        $models = DB::table("models")
            ->where("manufacturer_id", $id)
            ->pluck('name', 'id');
        return json_encode($models);
    }

    public function storeCar(Request $request)
    {
        $user = Auth::user()->id;
        $manufacturer = $request->input('Manufacturer');
        $model = $request->input('Model');
        $bodystyle = $request->input('Bodystyle');
        $color = $request->input('Color');
        $condition = $request->input('Condition');
        $year = $request->input('Year');
        $fuel = $request->input('Fuel');
        $gearbox = $request->input('GearBox');
        $registration = $request->input('Registration');
        $state = $request->input('State');
        $mileage = $request->input('Mileage');
        $description = $request->input('Description');
        $price = $request->input('Price');

        $cars = new cars();
        $cars->user_id = $user;
        $cars->manufacturer_id = $manufacturer;
        $cars->model_id = $model;
        $cars->bodystyle_id = $bodystyle;
        $cars->color_id = $color;
        $cars->condition_id = $condition;
        $cars->year_id = $year;
        $cars->fuel_id = $fuel;
        $cars->gearbox_id = $gearbox;
        $cars->registration_id = $registration;
        $cars->state_id = $state;
        $cars->mileage = $mileage;
        $cars->description = $description;
        $cars->price = $price;
        // dd($cars);
        $cars->save();
    }
}
