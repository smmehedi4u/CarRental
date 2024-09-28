<?php

namespace App\Mail;

use App\Models\Rental;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class CarRented extends Mailable
{
    use Queueable, SerializesModels;

    public $rental;

    public function __construct(Rental $rental)
    {
        $this->rental = $rental;
    }

    public function build()
    {
        return $this->view('emails.customer_rental')
                    ->subject('Car Rental Confirmation')
                    ->with([
                        'carName' => $this->rental->car->name,
                        'startDate' => $this->rental->start_date,
                        'endDate' => $this->rental->end_date,
                        'totalCost' => $this->rental->total_cost,
                    ]);
    }
}
