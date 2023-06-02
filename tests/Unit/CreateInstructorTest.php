<?php

namespace Tests\Unit;

use App\Models\Instructor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateInstructorTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_instructor()
    {
        $rfidNumber = '1234567890'; 

        $response = $this->post('/instructor/add', [
            'rfid_number' => $rfidNumber,
        ]);

        $response->assertStatus(200);

        // Assert that the instructor is created and saved in the database
        $this->assertDatabaseHas('instructor', [
            'rfid_number' => $rfidNumber,
        ]);
    }
}
