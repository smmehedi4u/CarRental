<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {

        // Fetch the total number of cars
        $totalCars = Car::count();
        // dd($totalCars);
        // Fetch the number of available cars
        $availableCars = Car::where('availability', true)->count();

        // Fetch the total number of rentals
        $totalRentals = Rental::count();

        // Calculate the total earnings from rentals
        $totalEarnings = Rental::sum('total_cost');

        // Pass the data to the view
        return view('admin.dashboard', compact('totalCars', 'availableCars', 'totalRentals', 'totalEarnings'));
    }
}
