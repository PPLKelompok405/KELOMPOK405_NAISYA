<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    public function test_dashboard_shows_different_view_for_authenticated_user(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/dashboard');
        
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.user');
    }
}