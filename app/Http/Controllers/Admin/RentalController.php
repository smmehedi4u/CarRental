<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with('user', 'car')->get();
        return view('admin.rentals.index', compact('rentals'));
    }

    public function create()
    {
        $cars = Car::where('availability', true)->get();
        $customers = User::where('usertype', 'customer')->get();
        return view('admin.rentals.create', compact('cars', 'customers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:Ongoing,Completed,Canceled',
        ]);
        // Get the car details including daily rent price
        $car = Car::findOrFail($validatedData['car_id']);

        // Calculate the rental period in days
        $startDate = Carbon::parse($validatedData['start_date']);
        $endDate = Carbon::parse($validatedData['end_date']);
        $days = $startDate->diffInDays($endDate) + 1;  // Include the end day in the rental period

        // Calculate total cost
        $totalCost = $car->daily_rent_price * $days;

        Rental::create([
            'user_id' => $validatedData['user_id'],
            'car_id' => $car->id,
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'total_cost' => $totalCost,
            'status' => $validatedData['status'],
        ]);
        return redirect()->route('rentals.index')->with('success', 'Rental created successfully.');
    }

    public function edit($id)
    {
        $rental = Rental::findOrFail($id);
        $cars = Car::where('availability', true)->get();
        $customers = User::where('usertype', 'customer')->get();
        return view('admin.rentals.edit', compact('rental', 'cars', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);

        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_cost' => 'required|numeric',
            'status' => 'required|in:Ongoing,Completed,Canceled',
        ]);

        $rental->update($validatedData);
        return redirect()->route('rentals.index')->with('success', 'Rental updated successfully.');
    }

    public function destroy($id)
    {
    //delete rental
    $rental = Rental::findOrFail($id);
    $rental->delete();
    return redirect()->route('rentals.index')->with('success', 'Rental deleted successfully.');
    }
}
