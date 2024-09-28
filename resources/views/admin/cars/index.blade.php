<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cars Dashboard') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 bg-white border-b border-gray-200">
                     <div class="flex justify-between text-gray-700">
                         <h4>All Cars</h4>
                         <a href="{{ route('cars.create') }}"
                             class="btn btn-primary focus:outline-none text-black bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                             Add Cars </a>
                     </div>
                     <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                         <table class="w-full text-sm text-left text-gray-500 ">
                             <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                 <tr>
                                     <th scope="col" class="px-6 py-3">
                                         Name
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         Brand
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         Model
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         Year
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         Car Type
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         Rent Price (Daily)
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         Availability
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         Image
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         <span class="sr-only">Action</span>
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>
                                @foreach ($cars as $car)
                                    <tr class="bg-white border-b  ">
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $car->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $car->brand }}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $car->model }}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $car->year }}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $car->car_type }}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $car->daily_rent_price }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $car->availability ? 'Available' : 'Not Available' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" width="80">
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <form action="{{ route('cars.destroy',$car->id) }}" method="Post">
                                            <a href="{{ route('cars.edit',$car->id) }}" class="btn btn-success">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
