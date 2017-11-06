<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShippedToClient extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

	public $user_data;
	public $admin_mail;
	public $contacts;

    public function __construct($user_data, $admin_mail, $contacts)
    {
	    $this->user_data = $user_data;
	    $this->admin_mail = $admin_mail;
	    $this->contacts = $contacts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
	    return $this->markdown('emails.orders.shipped_to_client')->subject('Новая заявка');
    }
}
