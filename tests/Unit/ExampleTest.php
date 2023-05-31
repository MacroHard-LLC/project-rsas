<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
 
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     * 
     * @return void
     */

    public function test_the_homepage_returns_success(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
