<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShopLocked extends Mailable
{
    use Queueable, SerializesModels;

    public $shop;

    public function __construct($shop)
    {
        $this->shop = $shop;
    }

    public function build()
    {
        return $this->view('admin.mail.shop_locked'); // Adjust the view path accordingly
    }

}