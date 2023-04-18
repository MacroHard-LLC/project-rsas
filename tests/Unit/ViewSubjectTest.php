<?php

namespace Tests\Unit;

use App\Models\Subject_table;
use App\Models\Machine_table;
use App\Models\Schedule_table;

use Tests\TestCase;

//use PHPUnit\Framework\TestCase;

class ViewSubjectTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_ViewSubject(): void
    {
        $response = $this->get('/subject');
        $response->assertStatus(200);

        $response = $this->get('/subjects/create');
        $response->assertStatus(200);
    }
}
