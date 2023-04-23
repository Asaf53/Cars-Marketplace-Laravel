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
        return view('addcar', compact('manufacturer', 'color', 'bodystyle', 'condition'));
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

        $cars = new cars();
        $cars->user_id = $user;
        $cars->manufacturer_id = $manufacturer;
        $cars->model_id = $model;
        $cars->bodystyle_id = $bodystyle;
        $cars->color_id = $color;
        $cars->condition_id = $condition;
        // dd($cars);
        $cars->save();
    }
}
