<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
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
        $response = $this->get('/home');
        $response->assertStatus(200);
    }
}
