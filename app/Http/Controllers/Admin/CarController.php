<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    // Display a listing of cars
    public function index() {
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    // Show the form for creating a new car
    public function create() {
        return view('admin.cars.create');
    }

    // Store a newly created car in the database
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'car_type' => 'required|string',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Car::create(array_merge($validated, ['image' => $imagePath]));

        return redirect()->route('cars.index')->with('success', 'Car added successfully');
    }

    // Show the form for editing the specified car
    public function edit(Car $car) {
        return view('admin.cars.edit', compact('car'));
    }

    // Update the specified car in the database
    public function update(Request $request, Car $car) {
        $validated = $request->validate([
            'name' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'car_type' => 'required|string',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('car_images', 'public');
            $car->update(array_merge($validated, ['image' => $imagePath]));
        } else {
            $car->update($validated);
        }

        return redirect()->route('cars.index')->with('success', 'Car updated successfully');
    }

    // Remove the specified car from the database
    public function destroy(Car $car) {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully');
    }
}
