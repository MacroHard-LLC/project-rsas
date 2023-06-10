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
        $first = 'Obi';
        $middle = 'Wan';
        $last = 'Kenobi';

        $response = $this->post('/instructor/add', [
            'rfid_number' => $rfidNumber,
            'first_name' => $first,
            'middle_name' => $middle,
            'last_name' => $last,
        ]);

        $response->assertStatus(200);

        // Assert that the instructor is created and saved in the database
        $this->assertDatabaseHas('instructor', [
            'rfid_number' => $rfidNumber,
            'first_name' => $first,
            'middle_name' => $middle,
            'last_name' => $last,
        ]);
    }
}
