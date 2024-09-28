@extends('frontend.layout')

@section('title', 'Cars Page')

@section('content')
<div class="container">
    <h1>Available Cars</h1>

    <form action="{{ route('rentals') }}" method="GET">
        <div class="form-row">
             <!-- Car Type Filter -->
             <div class="col-md-3">
                <label for="car_type">Car Type:</label>
                <select name="car_type" id="car_type" class="form-control filter-select">
                    <option value="">Select Type</option>
                    @foreach($car_types as $type)
                        <option value="{{ $type->car_type }}" {{ request('car_type') == $type->car_type ? 'selected' : '' }}>{{ $type->car_type }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Brand Filter -->
            <div class="col-md-3">
                <label for="brand">Brand:</label>
                <select name="brand" id="brand" class="form-control filter-select">
                    <option value="">Select Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->brand }}" {{ request('brand') == $brand->brand ? 'selected' : '' }}>{{ $brand->brand }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Max Daily Rent Price Filter -->
            <div class="col-md-3">
                <label for="max_price">Max Daily Rent Price:</label>
                <input type="number" name="max_price" class="form-control" placeholder="Max Price" value="{{ request('max_price') }}">
            </div>

            <div class="col">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Display Filtered Cars -->
    <div class="row">
        @foreach($cars as $car)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top img-fluid" alt="{{ $car->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->name }}</h5>
                        <p class="card-text">{{ $car->brand }} - {{ $car->model }}</p>
                        <p class="card-text">Type: {{ $car->car_type }}</p>
                        <p class="card-text">Year: {{ $car->year }}</p>
                        <p class="card-text">Daily Rent: ${{ $car->daily_rent_price }}</p>
                        <p class="card-text">Availability: {{ $car->availability ? 'Available' : 'Not Available' }}</p>
                        <a href="{{ route('rental.create', $car->id) }}" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- JavaScript to Control Dropdown Behavior -->
<script>
    document.querySelectorAll('.filter-select').forEach(select => {
        // Initially hide all options except the first one
        select.querySelectorAll('option:not(:first-child)').forEach(option => {
            option.style.display = 'none';
        });

        // When the user clicks on the dropdown, show all options
        select.addEventListener('click', function() {
            this.querySelectorAll('option').forEach(option => {
                option.style.display = '';
            });
        });
    });
</script>
@endsection

