<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user_data;
    public $admin_mail;

    public function __construct($user_data, $admin_mail)
    {
        $this->user_data = $user_data;
        $this->admin_mail = $admin_mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pirojok167@gmail.com')->view('mail.order')->subject('Новая заявка');
    }
}