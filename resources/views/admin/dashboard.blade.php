<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            margin-top: 20px;
            margin-left: 20px;
            margin-right: 20px;
        }

        .card h2 {
            font-size: 2rem;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;
        }

    </style>

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">




    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header font-weight-bold">Total Cars</div>
                    <div class="card-body">
                        <h2 class="card-title">{{ $totalCars }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header font-weight-bold">Available Cars</div>
                    <div class="card-body">
                        <h2 class="card-title">{{ $availableCars }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header font-weight-bold">Total Rentals</div>
                    <div class="card-body">
                        <h2 class="card-title">{{ $totalRentals }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header font-weight-bold">Total Earnings</div>
                    <div class="card-body">
                        <h2 class="card-title">${{ number_format($totalEarnings, 1) }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
