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
        return view('addcar', compact('manufacturer'));
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

        $cars = new cars();
        $cars->user_id = $user;
        $cars->manufacturer_id = $manufacturer;
        $cars->model_id = $model;
        // dd($cars);
        $cars->save();
    }
}
