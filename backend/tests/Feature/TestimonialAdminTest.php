<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class TestimonialAdminTest extends TestCase
{
    public function test_admin_can_create_a_testimonial_with_message(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/testimonials', [
            'name' => 'Modou Ndiaye',
            'role' => 'Ingénieur / freelancer',
            'message' => 'Il y a 20 ans, j’ai débuté chez MAS BTP ...',
        ]);

        $response->assertRedirect(route('admin.testimonials.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('testimonials', [
            'name' => 'Modou Ndiaye',
            'role' => 'Ingénieur / freelancer',
            'message' => 'Il y a 20 ans, j’ai débuté chez MAS BTP ...',
        ]);
    }
}
