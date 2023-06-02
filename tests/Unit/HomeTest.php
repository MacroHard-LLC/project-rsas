<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_home_page_returns_success(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_home_route_redirects_to_login_page(): void
    {
        $response = $this->get('/home');
        $response->assertStatus(302);
    }
    public function test_login_button_redirects_to_login_page(): void
    {
        $response = $this->get('/');
        $response->assertSee('Login')->assertStatus(200);

        // Assuming clicking the login button triggers a redirect to the login page
        $loginButtonUrl = URL::signedRoute('login'); // Replace 'login' with the actual route name for the login page
        $loginResponse = $this->get($loginButtonUrl);
        $loginResponse->assertStatus(200);
        $loginResponse->assertSee('Welcome back!'); // Replace 'Login page content' with the expected content on the login page
    }
}
