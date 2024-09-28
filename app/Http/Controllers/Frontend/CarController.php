<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function index(Request $request)
    {
        // Start a query builder
    $query = Car::query();

    // Filter by car type if provided
    if ($request->filled('car_type')) {
        $query->where('car_type', $request->car_type);
    }

    // Filter by brand if provided
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

    // Filter by max daily rent price if provided
    if ($request->filled('max_price')) {
            $query->where('daily_rent_price', '<=', $request->max_price);
        }

        // Paginate the filtered results
    $cars = $query->get();

    // Get all unique brands and car types for filter options
        $brands = Car::select('brand')->distinct()->get();
        $car_types = Car::select('car_type')->distinct()->get();

        return view('frontend.cars', compact('cars','brands','car_types'));
    }
}
