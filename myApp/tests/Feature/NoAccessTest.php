<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_no_access_page()
    {

        $admin = User::factory()->create(['type' => 'admin']);
        $response = $this->actingAs($admin)->get('/no-access');
        $response->assertStatus(200);
        $response->assertSee('No Access');

    }
}
