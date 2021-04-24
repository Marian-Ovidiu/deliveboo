<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Order;

class NewOrderReceived extends Mailable
{
    use Queueable, SerializesModels;

    protected $order = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = $this->order;
        return $this->from('info@deliveboo.com', 'Deliveboo')
                    ->subject('Mailtrap Confirmation')
                    ->markdown('mail.order-received', compact('order'));
    }
}
