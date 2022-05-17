<?php

namespace Tests\Feature;

use App\Models\PlanTemplate;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlanTemplateControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function auth_can_update()
    {
        $this->seedDatabase();
        $user = User::find(1);
        $this->actingAs($user)->assertAuthenticated();

        $this->mimicPlanTemplateHit($user->id);

        $data = ['template' => '{"template":"{\"friday\":{\"lunch\":1,\"dinner\":1,\"breakfast\":1},\"monday\":{\"lunch\":1,\"dinner\":1,\"breakfast\":0},\"sunday\":{\"lunch\":1,\"dinner\":1,\"breakfast\":1},\"tuesday\":{\"lunch\":1,\"dinner\":1,\"breakfast\":1},\"saturday\":{\"lunch\":1,\"dinner\":1,\"breakfast\":1},\"thursday\":{\"lunch\":1,\"dinner\":1,\"breakfast\":1},\"wednesday\":{\"lunch\":1,\"dinner\":1,\"breakfast\":1}}"}'];
        $this->post('/plan-template', $data)
            ->assertStatus(200);

        $this->assertDatabaseHas('plan_templates', $data);
    }

    /** @test */
    public function no_auth_cant_update()
    {
        $this->seedDatabase();

        $data = ['template' => '{"template":"{\"friday\":{\"lunch\":1,\"dinner\":1,\"breakfast\":1},\"monday\":{\"lunch\":1,\"dinner\":1,\"breakfast\":0},\"sunday\":{\"lunch\":1,\"dinner\":1,\"breakfast\":1},\"tuesday\":{\"lunch\":1,\"dinner\":1,\"breakfast\":1},\"saturday\":{\"lunch\":1,\"dinner\":1,\"breakfast\":1},\"thursday\":{\"lunch\":1,\"dinner\":1,\"breakfast\":1},\"wednesday\":{\"lunch\":1,\"dinner\":1,\"breakfast\":1}}"}'];
        $this->post('/plan-template', $data)
            ->assertStatus(302);
    }
}
