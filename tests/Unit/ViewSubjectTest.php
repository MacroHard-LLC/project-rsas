<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewSubjectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_ViewSubject(): void
    {
        // Create an admin user
        $admin = User::factory()->create(['role' => 'admin']);

        // Log in the admin user
        $this->actingAs($admin);

        // Access the subjects page
        $response = $this->get('/subjects');

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);
    }
}
