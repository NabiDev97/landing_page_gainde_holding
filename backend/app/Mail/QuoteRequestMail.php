<?php

namespace App\Mail;

use App\Models\Contact;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public Contact $contact;
    public array $validated;

    public function __construct(Contact $contact, array $validated)
    {
        $this->contact = $contact;
        $this->validated = $validated;
    }

    public function build(): self
    {
        $pdf = Pdf::loadView('emails.quote-request-pdf', [
            'contact' => $this->contact,
            'validated' => $this->validated,
        ]);

        return $this->subject('Nouvelle demande de devis - ' . ($this->validated['project_type'] ?? 'Projet'))
            ->markdown('emails.quote-request')
            ->attachData($pdf->output(), 'demande-devis-' . now()->format('Ymd-His') . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
