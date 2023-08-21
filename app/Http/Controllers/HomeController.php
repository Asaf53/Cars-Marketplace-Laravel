<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\carsImages;
use App\Models\year;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $query = Cars::query();
        if ($request->has('sort')) {
            $sort = $request->input('sort');

            // Apply sorting based on the provided parameter
            switch ($sort) {
                case 'price_asc':
                    $query->orderBy('price');
                    break;
                case 'price_desc':
                    $query->orderByDesc('price');
                    break;
                case 'mileage_asc':
                    $query->orderBy('mileage');
                    break;
                case 'mileage_desc':
                    $query->orderByDesc('mileage');
                    break;
                case 'year_asc':
                    $query->orderBy('year_id');
                    break;
                case 'year_desc':
                    $query->orderByDesc('year_id');
                    break;
                case 'listing_asc':
                    $query->orderBy('created_at');
                    break;
                case 'listing_desc':
                    $query->orderByDesc('created_at');
                    break;
                default:
                    // Handle any unsupported sort option
                    break;
            }
        }
        $cars = $query->orderByDesc('created_at')->get();
        // dd($cars);
        // $cars = Cars::all();
        return view('home', compact('cars'));
    }
}
