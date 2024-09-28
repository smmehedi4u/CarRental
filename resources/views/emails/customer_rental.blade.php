@extends('frontend.layout')

@section('content')
<h1>Car Rental Confirmation</h1>
<p>Dear {{ $rental->user->name }},</p>
<p>Thank you for renting a car with us. Here are your rental details:</p>
<ul>
    <li>Car: {{ $carName }}</li>
    <li>Start Date: {{ $startDate }}</li>
    <li>End Date: {{ $endDate }}</li>
    <li>Total Cost: {{ $totalCost }}</li>
</ul>
<p>We hope you have a great experience!</p>

@endsection
