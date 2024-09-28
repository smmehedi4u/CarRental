@extends('frontend.layout')

@section('title', 'Cars Page')

@section('content')
      <!-- services section start -->
      <div class="services_section layout_padding">
        <div class="container">
           <h1 class="services_taital">Cars</h1>
           <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
           <div class="services_section_2">
              <div class="row">
                @foreach($cars as $car)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}" style="width: 300px; height: 200px; object-fit: cover; border-radius: 10px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->name }}</h5>
                            <p class="card-text">
                                <strong>Brand:</strong> {{ $car->brand }}<br>
                                <strong>Car Type:</strong> {{ $car->car_type }}<br>
                                <strong>Rent Price:</strong> ${{ $car->daily_rent_price }} / day
                            </p>
                        </div>
                    </div>
                </div>
                 @endforeach
                 <!-- Show More button -->
                 <div class="d-flex justify-content-center">
                    <a href="{{ route('rentals') }}" class="btn btn-success readmore_bt">Show More Cars</a>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- services section end -->
@endsection
