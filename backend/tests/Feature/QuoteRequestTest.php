<?php

namespace Tests\Feature;

use App\Jobs\SendQuoteRequestEmail;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class QuoteRequestTest extends TestCase
{
    public function test_quote_request_is_dispatched_for_asynchronous_email_processing(): void
    {
        Bus::fake();

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

        Bus::assertDispatched(SendQuoteRequestEmail::class, function (SendQuoteRequestEmail $job) {
            $this->assertSame('client@example.com', $job->contact->email);
            $this->assertSame('Construction Nouvelle', $job->validated['project_type']);

            return true;
        });
    }

    public function test_quote_request_is_saved_even_when_mail_transport_fails(): void
    {
        Bus::fake();

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

        Bus::assertDispatched(SendQuoteRequestEmail::class);
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
