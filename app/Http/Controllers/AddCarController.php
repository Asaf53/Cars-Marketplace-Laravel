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
        return view('addcar', compact('manufacturer', 'color', 'bodystyle', 'condition', 'year'));
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

        $cars = new cars();
        $cars->user_id = $user;
        $cars->manufacturer_id = $manufacturer;
        $cars->model_id = $model;
        $cars->bodystyle_id = $bodystyle;
        $cars->color_id = $color;
        $cars->condition_id = $condition;
        $cars->year_id = $year;
        // dd($cars);
        $cars->save();
    }
}
