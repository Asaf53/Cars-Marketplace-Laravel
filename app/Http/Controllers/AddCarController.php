<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\manufacturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AddCarController extends Controller
{
    public function index()
    {
        $manufacturer = DB::table("manufacturers")->orderBy('brand', 'asc')->pluck('brand', 'id');
        $color = DB::table("colors")->orderBy('color', 'asc')->pluck('color', 'id');
        $bodystyle = DB::table("bodystyles")->orderBy('style', 'asc')->pluck('style', 'id');
        $condition = DB::table("conditions")->orderBy('condition', 'asc')->pluck('Condition', 'id');
        $year = DB::table("years")->orderBy('id', 'asc')->pluck('year', 'id');
        $fuel = DB::table("fuels")->orderBy('fuel', 'asc')->pluck('fuel', 'id');
        $gearbox = DB::table("gearboxes")->orderBy('gearbox', 'asc')->pluck('gearbox', 'id');
        $registration = DB::table("registrations")->orderBy('registration', 'asc')->pluck('registration', 'id');
        $state = DB::table("states")->orderBy('state', 'asc')->pluck('state', 'id');
        return view('addcar', compact('manufacturer', 'color', 'bodystyle', 'condition', 'year', 'fuel', 'gearbox', 'registration', 'state'));
    }

    public function modelss($id)
    {
        $models = DB::table("models")
            ->where("manufacturer_id", $id)
            ->orderBy('name', 'asc')
            ->pluck('name', 'id');
        return json_encode($models);
    }

    public function storeCar(Request $request)
    {
        // $images = $request->input('images');
        // dd($images);

        // foreach ($request->input('images') as $image) {
        //     $filename = $image->store('public/images');
        //     $url = Storage::url($filename);

        //     // Save the image URL to the database or do something else with it
        // }

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
        $cars->save();

        return redirect()->route('home')->with('alert', 'Car Added Successfully');
        // dd($cars);


        // if ($user->) {
        // } else {
        //     echo "not verified";
        // }
    }
    // public function uploadImages(Request $request)
    // {
    //     $images = $request->file('images');

    //     foreach ($images as $image) {
    //         $filename = $image->store('public/images');
    //         $url = Storage::url($filename);

    //         // Save the image URL to the database or do something else with it
    //     }

    //     return response()->json(['message' => 'Images uploaded successfully.']);
    // }
}
