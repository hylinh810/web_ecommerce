<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShopConfirmationMail extends Mailable
{
    use SerializesModels;

    public $shop;

    public function __construct(User $shop)
    {
        $this->shop = $shop;
    }

    public function build()
    {
        return $this->view('admin.mail.shop_confirmation'); // Adjust the view path accordingly
    }
}