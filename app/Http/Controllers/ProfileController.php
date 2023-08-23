<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\carsImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user_id = Auth::user()->id;
        $cars = cars::all()->where('user_id', '=', $user_id);
        // dd($cars);
        // foreach ($cars as $car) {
        //     echo $car->manufacturers->brand;
        //     echo $car->models->name;
        // }

        return view('profile', compact('cars'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = cars::findOrFail($id);
        $manufacturer = DB::table("manufacturers")->orderBy('brand', 'asc')->pluck('brand', 'id');
        $color = DB::table("colors")->orderBy('color', 'asc')->pluck('color', 'id');
        $bodystyle = DB::table("bodystyles")->orderBy('id', 'asc')->pluck('style', 'id');
        $condition = DB::table("conditions")->orderBy('condition', 'asc')->pluck('Condition', 'id');
        $year = DB::table("years")->orderBy('id', 'asc')->pluck('year', 'id');
        $fuel = DB::table("fuels")->orderBy('fuel', 'asc')->pluck('fuel', 'id');
        $gearbox = DB::table("gearboxes")->orderBy('gearbox', 'asc')->pluck('gearbox', 'id');
        $registration = DB::table("registrations")->orderBy('registration', 'asc')->pluck('registration', 'id');
        $state = DB::table("states")->orderBy('state', 'asc')->pluck('state', 'id');
        return view('editcar', compact('car', 'manufacturer', 'color', 'bodystyle', 'condition', 'year', 'fuel', 'gearbox', 'registration', 'state'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $car = cars::findOrFail($id);

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

        $car->user_id = $user;
        $car->manufacturer_id = $manufacturer;
        $car->model_id = $model;
        $car->bodystyle_id = $bodystyle;
        $car->color_id = $color;
        $car->condition_id = $condition;
        $car->year_id = $year;
        $car->fuel_id = $fuel;
        $car->gearbox_id = $gearbox;
        $car->registration_id = $registration;
        $car->state_id = $state;
        $car->mileage = $mileage;
        $car->description = $description;
        $car->price = $price;
        $car->update($request->all());

        return redirect()->route('profiles.show', Auth::user()->id)->with('alert', 'Car edited successffully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cars = cars::findOrFail($id);
        foreach ($cars->images as $car) {
            $image_path = 'storage/images/cars/' . $car->image;
            unlink($image_path);
        }
        $cars->delete();
        return redirect()->route('profiles.show', Auth::user()->id)->with('alert', 'Car Deleted Successfully');
    }
}
