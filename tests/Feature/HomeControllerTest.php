<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function no_auth_gets_redirect()
    {
        $this->get('/')
            ->assertStatus(302);
    }

    /** @test */
    public function auth_can_view_index()
    {
        $this->seedDatabase();
        $this->actingAs(User::find(1))->assertAuthenticated();

        $this->get('/')
            ->assertStatus(200);
    }
}
