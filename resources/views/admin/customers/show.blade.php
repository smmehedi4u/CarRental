<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers Rental History') }}
        </h2>
    </x-slot>

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between text-gray-700">
                    <h4>Name: {{ $customer->name }}</h4>
                    <p><strong>Email:</strong> {{ $customer->email }}</p>
                    <p><strong>Phone Number:</strong> {{ $customer->phone_number }}</p>
                    <p><strong>Address:</strong> {{ $customer->address }}</p>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Rental ID
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
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($customer->rentals as $rental)
                               <tr class="bg-white border-b  ">
                                   <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                   {{ $rental->id }}
                                   </td>
                                   <td class="px-6 py-4">
                                   {{ $rental->car->name }}
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
