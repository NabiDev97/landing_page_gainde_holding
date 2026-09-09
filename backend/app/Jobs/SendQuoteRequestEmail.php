<?php

namespace App\Jobs;

use App\Mail\QuoteRequestMail;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportException;

class SendQuoteRequestEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Contact $contact;
    public array $validated;

    public function __construct(Contact $contact, array $validated)
    {
        $this->contact = $contact;
        $this->validated = $validated;
    }

    public function handle(): void
    {
        try {
            Mail::to('mougaye1225@gmail.com')->send(new QuoteRequestMail($this->contact, $this->validated));
        } catch (TransportException $e) {
            Log::error('Quote request email could not be sent from queue.', [
                'contact_id' => $this->contact->id,
                'email' => $this->contact->email,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
