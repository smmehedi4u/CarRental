<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers Dashboard') }}
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
                         <h4>All Customers</h4>
                     </div>
                     <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                         <table class="w-full text-sm text-left text-gray-500 ">
                             <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                 <tr>
                                     <th scope="col" class="px-6 py-3">
                                         Name
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         Email
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         Phone Number
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         Address
                                     </th>
                                     <th scope="col" class="px-6 py-3">
                                         <span class="sr-only">Action</span>
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>
                                @foreach ($customers as $customer)
                                    <tr class="bg-white border-b  ">
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $customer->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $customer->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $customer->phone_number }}
                                        </td>
                                        <td class="px-6 py-4">
                                        {{ $customer->address }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <form action="{{ route('customers.destroy',$customer->id) }}" method="Post">
                                            <a href="{{ route('customers.show',$customer->id) }}" class="btn btn-info">View</a>
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
