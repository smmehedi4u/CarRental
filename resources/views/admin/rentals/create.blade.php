<x-app-layout>
    <x-slot name="title">
        Add Rental
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Rental') }}
        </h2>
    </x-slot>

         <!-- Bootstrap CSS -->
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('rentals.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="mb-6">
                            <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Customer</label>
                            <select name="user_id" class="form-control">
                                @foreach ($customers as $customer)
                                <option value="{{  $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="car_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Car</label>
                            <select name="car_id" id="car_id" class="form-control">
                                <option value="">Select a car</option>
                                @foreach ($cars as $car)
                                <option value="{{  $car->id }}">{{ $car->name }} ({{ $car->brand }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Start Date</label>
                            <input id="start_date" value="{{ date('Y-m-d') }}" type="date"  name="start_date"  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required />
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">End Date</label>
                            <input id="end_date" value="{{ date('Y-m-d') }}" type="date"  name="end_date"  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required />
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Total Cost</label>
                            <input type="text"  name="total_cost" id="total_cost" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" readonly>
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status</label>
                            <select name="status" class="form-control">
                                <option value="Ongoing">Ongoing</option>
                                <option value="Completed">Completed</option>
                                <option value="Canceled">Canceled</option>
                            </select>
                        </div>

                        <button type="submit"
                            class="btn btn-primary text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">
                            Submit
                        </button>
                        <script>
                            // Calculate total cost
                            function calculateTotalCost() {
                                //get the start date, end date, and car id
                                const startDate = document.getElementById('start_date').value;
                                const endDate = document.getElementById('end_date').value;
                                const carId = document.getElementById('car_id').value;

                                //date difference in days
                                const date1 = new Date(startDate);
                                const date2 = new Date(endDate);


                                //get the difference in days
                                const differenceInTime = date2.getTime() - date1.getTime();

                                //convert to days
                                const differenceInDays = Math.round(differenceInTime / (1000 * 3600 * 24))+1;

                                //get the car details
                                const cars = @json($cars);

                                //console.log(cars);

                                //find the car in the array
                                const car = cars.find(car => car.id == carId);

                                //console.log(car);
                                //console.log(differenceInDays);

                                //calculate the total cost
                                const totalCost = car.daily_rent_price * differenceInDays;

                                //set the total cost in the input field
                                document.getElementById('total_cost').value = totalCost;


                            }

                            // Event listeners for calculating total cost
                            document.getElementById('start_date').addEventListener('change', calculateTotalCost);
                            document.getElementById('end_date').addEventListener('change', calculateTotalCost);
                            document.getElementById('car_id').addEventListener('change', calculateTotalCost);
                        </script>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

