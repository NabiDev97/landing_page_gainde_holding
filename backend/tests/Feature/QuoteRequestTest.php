<?php

namespace Tests\Feature;

use App\Mail\QuoteRequestMail;
use App\Models\Contact;
use App\Models\User;
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

    public function test_admin_can_view_and_download_quote_requests(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $contact = Contact::create([
            'name' => 'Amadou Fall',
            'email' => 'quote-admin@example.com',
            'phone' => '+221 77 999 88 77',
            'subject' => 'Demande de devis - Extension commerciale',
            'message' => "Type de projet : Extension commerciale\nAdresse du projet : Dakar\nSurface : 220 m²\nBudget estimé : 25000000\nDate de début souhaitée : 2026-11-01\nDélai prévu : 8 mois\n\nDescription du projet :\nBâtiment industriel à Dakar.",
        ]);

        $response = $this->actingAs($admin)->get('/admin/contacts');

        $response->assertOk();
        $response->assertSeeText('Demande de devis');
        $response->assertSee('quote-admin@example.com');

        $download = $this->actingAs($admin)->get('/admin/contacts/' . $contact->id . '/download');

        $download->assertOk();
        $download->assertHeader('Content-Type', 'application/pdf');
        $this->assertStringContainsString('demande-devis-', $download->headers->get('Content-Disposition'));
    }
}
