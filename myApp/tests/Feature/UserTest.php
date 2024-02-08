<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    public function test_if_owner_can_access_add_new_user_page()
    {
        $owner = User::factory()->create(['type' => 'owner']);
        $response = $this->actingAs($owner)->get('/add-user');

        $response->assertStatus(200);
    }


}
