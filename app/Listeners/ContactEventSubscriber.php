<?php

namespace App\Listeners;

use App\Events\ContactRequestEvent;
use App\Mail\PropertyContactMail;
use Illuminate\Events\Dispatcher;
use Illuminate\Mail\Mailer;

class ContactEventSubscriber
{

    public function __construct(private Mailer $mailer)
    {

    }
    public function sendEmailForContact(ContactRequestEvent $event)
    {
        $this->mailer->send(new PropertyContactMail($event->property, $event->data));

    }
    public function subscribe(Dispatcher $dispatcher) :array
    {
        return [
            ContactRequestEvent::class => 'sendEmailForContact'
        ];
        
        // You can also use this to listen to the event using the @listen annotation in your Event class
        // $dispatcher->listen(
        //     ContactRequestEvent::class,
        //     [ContactEventSubscriber::class, 'sendEmailForContact']
        // );
    }
}