<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\carsImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cars = cars::findOrFail($id);
        foreach ($cars->images as $car) {
            $image_path = 'storage/images/cars/'.$car->image;
            unlink($image_path);
        }
        $cars->delete();
        return redirect()->route('profiles.show', Auth::user()->id)->with('alert', 'Car Deleted Successfully');
    }
}
