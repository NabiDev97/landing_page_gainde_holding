<?php

namespace Tests\Feature;

use App\Models\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeamPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_team_page_displays_the_saved_member_role_and_bio(): void
    {
        TeamMember::create([
            'name' => 'Marie Diop',
            'role' => 'Architecte en chef',
            'bio' => 'Spécialiste en conception durable et gestion de projets.',
            'photo' => 'team_members/marie.jpg',
        ]);

        $response = $this->get('/team');

        $response->assertOk();
        $response->assertSee('Marie Diop');
        $response->assertSee('Architecte en chef');
        $response->assertSee('Spécialiste en conception durable et gestion de projets.');
    }
}
