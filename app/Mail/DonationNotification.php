<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $donationDetails;

    public function __construct($donationDetails)
    {
        $this->donationDetails = $donationDetails;
    }

    public function build()
    {
        return $this->subject('Konfirmasi Donasi Anda')
                    ->view('emails.donation-notification');
    }
}