<x-app-layout>
    <x-slot name="title">
        Add Car
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Car') }}
        </h2>
    </x-slot>

         <!-- Bootstrap CSS -->
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Car name</label>
                            <input id="name" type="text" name="name" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required
                                placeholder="Enter car name"></input>
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Brand</label>
                            <input id="name" type="text"  name="brand" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required
                                placeholder="Brand name"></input>
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Model</label>
                            <input id="name" type="text" name="model" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required
                                placeholder="Enter model"></input>
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Year of Manufacture</label>
                            <input id="name" type="number" name="year" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required
                                placeholder="Manucfature year"></input>
                        </div>
                        <div class="mb-6">
                            <label for="session" class="block mb-2 text-sm font-medium text-gray-900">Car Type</label>
                            <select name="car_type" class="form-control">
                                <option value="">Select Type</option>
                                <option value="suv">SUV</option>
                                <option value="sedan">Sedan</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Rent Price (Daily)</label>
                            <input id="name" type="number" name="daily_rent_price" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required
                                placeholder="Daily rent price"></input>
                        </div>
                        <div class="mb-6">
                            <label for="session" class="block mb-2 text-sm font-medium text-gray-900">Availability</label>
                            <select name="availability" class="form-control">
                                <option value="1">Available</option>
                                <option value="0">Not Available</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Car Image</label>
                            <input id="name" type="file" name="image" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required></input>
                        </div>

                        <button type="submit"
                            class="btn btn-primary text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">
                            Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

