<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\carsImages;
use App\Rules\NoSpecialCharacters;
use App\Rules\MultipleImagesValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class AddCarController extends Controller
{
    public function index()
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

        $request->validate([
            'Manufacturer' => ['required'],
            'Model' => ['required'],
            'Bodystyle' => ['required'],
            'Color' => ['required'],
            'Condition' => ['required'],
            'Year' => ['required'],
            'Fuel' => ['required'],
            'GearBox' => ['required'],
            'Registration' => ['required'],
            'State' => ['required'],
            'Mileage' => ['required', new NoSpecialCharacters()],
            'Description' => ['required', new NoSpecialCharacters()],
            'Price' => ['required', new NoSpecialCharacters()],
            'Power' => ['required', new NoSpecialCharacters()],
            'images' => ['required', 'array', new MultipleImagesValidation()],
            'phoneNumber' => ['required', new NoSpecialCharacters()]
        ]);

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
        $power = $request->input('Power');
        $phone = $request->input('phoneNumber');

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
        $cars->power = $power;
        $cars->phone_number = $phone;
        $cars->save();

        foreach ($request->file('images', []) as $imageFile) {
            // Ensure that the file is an image
            if ($imageFile->isValid() && $imageFile->getClientOriginalExtension()) {
                // Generate a unique name for the image to avoid naming conflicts
                $imageName = uniqid('car_image_' . $cars->id) . '.' . $imageFile->getClientOriginalExtension();


                $image = Image::make($imageFile); // Open the image using Intervention Image

                // Resize the image
                $image->resize(1000, 600);

                // Save the resized image using Laravel's file handling
                $imagePath = public_path('storage/images/cars/' . $imageName);
                $image->save($imagePath);

                // Create a new carsImages record in the database
                $images = new carsImages();
                $images->car_id = $cars->id;
                $images->image = $imageName;
                $images->save();
            }
        }

        return redirect()->route('home')->with('alert', 'Car Added Successfully');
    }
}
