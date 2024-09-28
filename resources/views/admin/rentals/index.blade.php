<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rentals Dashboard') }}
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
                         <h4>All Rentals</h4>
                         <a href="{{ route('rentals.create') }}"
                             class="btn btn-primary focus:outline-none text-black bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                             Add Rentals </a>
                     </div>
                     <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                         <table class="w-full text-sm text-left text-gray-500 ">
                             <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                 <tr>
                                     <th scope="col" class="px-6 py-3">
                                         Rental ID
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         Customer Name
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         Car
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         Start Date
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         End Date
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         Total Cost
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         Status
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         <span class="sr-only">Action</span>
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>
                                @foreach ($rentals as $rental)
                                    <tr class="bg-white border-b  ">
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $rental->id }}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $rental->user->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $rental->car->name }} ({{ $rental->car->brand }})
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $rental->start_date }}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $rental->end_date }}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $rental->total_cost }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $rental->status }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <form action="{{ route('rentals.destroy',$rental->id) }}" method="Post">
                                            <a href="{{ route('rentals.edit',$rental->id) }}" class="btn btn-success">Edit</a>
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
