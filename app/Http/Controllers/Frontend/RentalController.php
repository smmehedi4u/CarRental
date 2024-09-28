<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Rental;
use App\Mail\CarRented;
use App\Mail\CarRentedAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RentalController extends Controller
{
    public function create(Car $car)
    {
        return view('frontend.book', compact('car'));
    }

    public function store(Request $request, Car $car)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);


    // Check if the car is available for the selected dates
    $overlap = Rental::where('car_id', $car->id)
        ->where(function ($query) use ($request) {
            $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                  ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
        })
        ->exists();

    if ($overlap) {
        return back()->withErrors('Car is not available for the selected dates.');
    }


    // Calculate the rental period in days
    $startDate = Carbon::parse($request->start_date);
    $endDate = Carbon::parse($request->end_date);
    $rentalDays = $startDate->diffInDays($endDate) + 1; // Including start and end date

    // Calculate the total cost
    $totalCost = $rentalDays * $car->daily_rent_price;

    // Validate and create the rental
    $rental = Rental::create([
        'user_id' => auth()->id(),
        'car_id' => $car->id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'total_cost' => $totalCost,
    ]);


    // Send email to customer
    Mail::to(Auth::user()->email)->send(new CarRented($rental));

    // Send email to admin
    $adminEmail = 'mehedisarker379@gmail.com'; // Replace with actual admin email
    Mail::to($adminEmail)->send(new CarRentedAdmin($rental));


    return redirect()->route('rental.bookings')->with('success', 'Booking confirmed!');
}
    public function userBookings()
        {
            $rentals = Rental::where('user_id', Auth::id())->with('car')->get();
            return view('frontend.bookings', compact('rentals'));
        }

    public function cancel(Rental $rental)
    {
        if ($rental->start_date > now()) {
            $rental->delete();
            return redirect()->route('rental.bookings')->with('success', 'Booking canceled successfully.');
        }

        return back()->with('error', 'Cannot cancel an ongoing or past rental.');
    }

}
