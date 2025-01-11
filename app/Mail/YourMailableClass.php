<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class YourMailableClass extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Variabel untuk menyimpan data yang akan dikirim

    // Constructor untuk menerima data
    public function __construct($data)
    {
        $this->data = $data;
    }

    // Metode build untuk mengatur email
    public function build()
    {
        return $this->view('rizki210605@gmail.com') // Ganti dengan nama tampilan email Anda
                    ->subject('Terima Kasih SUdah berdonasi') // Subjek email
                    ->from(config('rizki210605@gmail.com'), config('rizki210605@gmail.com')); // Pengirim
    }
}