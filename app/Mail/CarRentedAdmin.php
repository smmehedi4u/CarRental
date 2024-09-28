<?php

namespace App\Mail;

use App\Models\Rental;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class CarRentedAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $rental;

    public function __construct(Rental $rental)
    {
        $this->rental = $rental;
    }

    public function build()
    {
        return $this->view('emails.admin_rental')
                    ->subject('New Car Rental Notification')
                    ->with([
                        'customerName' => $this->rental->user->name,
                        'carName' => $this->rental->car->name,
                        'startDate' => $this->rental->start_date,
                        'endDate' => $this->rental->end_date,
                    ]);
    }

}
