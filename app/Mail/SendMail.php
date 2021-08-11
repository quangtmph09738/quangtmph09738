<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $oders;

    public function __construct($oders)
    {
        $this->oders = $oders;
    }

    public function build()
    {
        return $this->subject('Xác nhận thanh toán')->view('mails.sendMailCheckOut');
    }
}
