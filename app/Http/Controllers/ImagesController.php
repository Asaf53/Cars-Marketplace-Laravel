<?php

namespace App\Http\Controllers;

use App\Models\carsImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function deleteImg($id)
    {
        $img = carsImages::find($id);
        if (!$img) {
            return redirect()->back()->with('msg', 'Image not found.');
        }
        $image_path = 'storage/images/cars/' . $img->image;
        unlink($image_path);
        $img->delete();
        return redirect()->back(201);
    }
}
