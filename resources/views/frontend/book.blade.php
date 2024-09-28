@extends('frontend.layout')

@section('title', 'Book Car')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('rental.store', $car->id) }}" method="POST">
                @csrf

                    <input type="hidden" name="car_id" value="{{ $car->id }}">

                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Start Date</label>
                        <input id="name" type="date" name="start_date" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required></input>
                    </div>
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">End Date</label>
                        <input id="name" type="date" name="end_date" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required></input>
                    </div>
                    <div class="form-group">
                        <label for="total_cost">Total Cost</label>
                        <input type="text" id="total_cost" name="total_cost" class="form-control" readonly>
                    </div>
                    <button type="submit"
                        class="btn btn-primary text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">
                        Submit </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('end_date').addEventListener('change', function() {
        var startDate = new Date(document.getElementById('start_date').value);
        var endDate = new Date(this.value);
        var oneDay = 24 * 60 * 60 * 1000;

        if (startDate && endDate && endDate > startDate) {
            var rentalDays = Math.round((endDate - startDate) / oneDay) + 1;
            var dailyRentPrice = {{ $car->daily_rent_price }};
            var totalCost = rentalDays * dailyRentPrice;

            document.getElementById('total_cost').value = totalCost;
        }
    });
</script>

@endsection
