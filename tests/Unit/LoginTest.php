<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test user login.
     *
     * @return void
     */
    public function test_student_login(): void
    {
        // Create a student user
        $student = User::factory()->create([
            'id' => $this->faker->unique()->numerify('#########'),
            'role' => 'student',
            'password' => bcrypt('password123'),
        ]);
    
        // Make a POST request to the login route with the student's credentials
        $response = $this->post('/login', [
            'id' => $student->id,
            'password' => 'password123',
        ]);
    
        // Assert that the student is redirected to the /login URL
        $response->assertRedirect('/login');
    }
    
    
        public function test_admin_login(): void{
        // Create an admin user
        $admin = User::factory()->create([
            'id' => $this->faker->unique()->numerify('#########'),
            'role' => 'admin',
            'password' => bcrypt('password123'),
        ]);

        // Make a POST request to the login route with the admin's credentials
        $response = $this->post('/login', [
            'user_id' => $admin->id,
            'password' => 'password123',
        ]);

        // Assert that the admin is redirected
        $response->assertRedirect('/');

        // Follow the redirect and assert that the user's name is present on the page
        $response = $this->get('/');
        // $response->assertSeeText('Oblong');
    }

    public function test_adviser_login(): void
    {
        // Create an adviser user
        $adviser = User::factory()->create([
            'id' => $this->faker->unique()->numerify('#########'),
            'role' => 'adviser',
            'password' => bcrypt('password123'),
        ]);

        // Make a POST request to the login route with the adviser's credentials
        $response = $this->post('/login', [
            'user_id' => $adviser->id,
            'password' => 'password123',
        ]);

        // Assert that the adviser is redirected
        $response->assertRedirect('/');
    }

    public function test_user_logout(): void
{
    // Create a user
    $user = User::factory()->create([
        'id' => $this->faker->unique()->numerify('#########'),
        'password' => bcrypt('password123'),
        'role' => 'admin',
    ]);


    // Login the user
    $this->actingAs($user);

    // Assert that the user is authenticated
    $this->assertAuthenticated();

    // Logout the user
    $response = $this->post('/logout');

}

}
