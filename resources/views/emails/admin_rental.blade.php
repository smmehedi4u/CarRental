@extends('frontend.layout')

@section('content')
<h1>New Car Rental Notification</h1>
<p>A customer has just rented a car. Here are the details:</p>
<ul>
    <li>Customer: {{ $customerName }}</li>
    <li>Car: {{ $carName }}</li>
    <li>Start Date: {{ $startDate }}</li>
    <li>End Date: {{ $endDate }}</li>
</ul>
@endsection
