<?php

namespace Tests\Unit;

use App\Models\Schoolyear;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateSchoolYearTest extends TestCase
{
    public function test_the_home_page_returns_success(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    // use RefreshDatabase;

    // public function test_create_school_year()
    // {
    //     $startYear = '2022'; // Replace with your desired start year (4 digits)
    //     $endYear = '2023'; // Replace with your desired end year (4 digits)
    //     $startDate = '2022-09-01'; // Replace with your desired start date
    //     $endDate = '2023-06-30'; // Replace with your desired end date

    //     $response = $this->post('/schoolyear/add', [
    //         'start_year' => $startYear,
    //         'end_year' => $endYear,
    //         'start_date' => $startDate,
    //         'end_date' => $endDate,
    //     ]);

    //     $response->assertStatus(200);

    //     // Assert that the school year is created and saved in the database
    //     $this->assertDatabaseHas('schoolyear', [
    //         'start_year' => $startYear,
    //         'end_year' => $endYear,
    //         'start_date' => $startDate,
    //         'end_date' => $endDate,
    //     ]);
    // }
}