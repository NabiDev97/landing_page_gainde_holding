<?php

namespace Tests\Feature;

use App\Mail\QuoteRequestMail;
use Illuminate\Support\Facades\Mail;
use Mockery;
use Symfony\Component\Mailer\Exception\TransportException;
use Tests\TestCase;

class QuoteRequestTest extends TestCase
{
    public function test_quote_request_is_sent_to_the_company_email_with_pdf_attachment(): void
    {
        Mail::fake();

        $response = $this->post('/contact', [
            'name' => 'Moussa Diop',
            'email' => 'client@example.com',
            'phone' => '+221 77 123 45 67',
            'project_type' => 'Construction Nouvelle',
            'project_address' => 'Dakar',
            'surface' => '150',
            'budget' => '15000000',
            'start_date' => '2026-10-15',
            'duration_months' => 6,
            'details' => 'Bâtiment de 150 m² à Dakar avec une extension moderne et durable.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contacts', [
            'email' => 'client@example.com',
            'subject' => 'Demande de devis - Construction Nouvelle',
        ]);

        Mail::assertSentCount(1);
        Mail::assertSent(QuoteRequestMail::class, function (QuoteRequestMail $mail) {
            $mail->build();

            $this->assertSame('mougaye1225@gmail.com', $mail->to[0]['address'] ?? null);
            $this->assertNotEmpty($mail->rawAttachments);

            return true;
        });
    }

    public function test_quote_request_is_saved_even_when_mail_transport_fails(): void
    {
        Mail::shouldReceive('to')->once()->with('mougaye1225@gmail.com')->andReturnSelf();
        Mail::shouldReceive('send')->once()->with(Mockery::type(QuoteRequestMail::class))->andThrow(new TransportException('Connection timed out'));

        $response = $this->post('/contact', [
            'name' => 'Moussa Diop',
            'email' => 'client@example.com',
            'phone' => '+221 77 123 45 67',
            'project_type' => 'Construction Nouvelle',
            'project_address' => 'Dakar',
            'surface' => '150',
            'budget' => '15000000',
            'start_date' => '2026-10-15',
            'duration_months' => 6,
            'details' => 'Bâtiment de 150 m² à Dakar avec une extension moderne et durable.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contacts', [
            'email' => 'client@example.com',
            'subject' => 'Demande de devis - Construction Nouvelle',
        ]);
    }
}
