<?php

namespace App\Http\Controllers;

use App\Models\manufacturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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
}
