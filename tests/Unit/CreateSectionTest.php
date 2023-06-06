<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;



class CreateSectionTest extends TestCase
{
    use DatabaseMigrations;

    // public function test_the_home_page_returns_success(): void
    // {
    //     $response = $this->get('/');
    //     $response->assertStatus(200);
    // }
    
    public function test_create_seciton_form(): void
    {
        $request = $this->get('/section/create');
        $request->assertStatus(200);
    }

    public function test_if_adviser_request_works_if_exist(): void
    {
        // Create a user with an adviser role
        $adviser = User::factory()->create([
            'role' => 'adviser',
        ]);

        // Login the user
        $this->actingAs($adviser);

        // Make a POST request to the section adviser request route
        $response = $this->post('/section-adviser-request', [
            'input_data' => [
                'id' => $adviser->id,
            ],
        ]);

        // Assert that the request was successful
        $response->assertStatus(200);

    }


    // public function test_IfAdviserIdCannotBeChosen(): void{
    //     $response = $this->post('/section-adviser-request',[
    //         'input_data' => [
    //             'id' => 230492349
    //         ],
    //     ]);

    //     $this->assertFalse($response == false);
    // }

    // public function test_StudentNamePostSuccessfull(): void {
    //     $response = $this->post('/section-request',[
    //         'input_data' => [
    //             'id' => 696920202
    //         ],
    //     ])->assertStatus(200);

    //     $returnValue = $response->getContent();
    //     $this->assertNotNull($returnValue);
    // }

    // public function test_StudentNameReturnedIsActuallyNull(): void {
    //     // if the id is from an faculty
    //     $response = $this->post('/section-request',[
    //         'input_data' => [
    //             'id' => 230492349
    //         ],
    //     ])->assertStatus(200);

    //     $returnValue = $response->getContent();
    //     $this->assertTrue($returnValue == '');

    //     // if the id is from a student but already enrolled
    //     $response = $this->post('/section-request',[
    //         'input_data' => [
    //             'id' => 234423234
    //         ],
    //     ])->assertStatus(200);

    //     $returnValue = $response->getContent();
    //     $this->assertTrue($returnValue == '');
    // }

    // public function test_GettingAllStudentsForStudentNameSuccessfull(): void {
    //     // if the id is from an faculty
    //     $response = $this->post('/section-get-students',[
    //         'input_data' => 'Work, Josdifui'
    //     ])->assertStatus(200);

    //     $returnValue = $response->getContent();
    //     $this->assertNotNull($returnValue);
    // }

    // public function test_AssignStudentsTheSection(): void {
    //     // if the id is from an faculty
    //     $response = $this->post('/section/register',[
    //         'allStudentID' => [101231231],
    //         'gradeLevel' => 1
    //     ])->assertStatus(200);

    //     // reverts the row to its original state
    //     $revertRow = User::where('id',101231231)->first();
    //     $revertRow->is_enrolled = null;
    //     $revertRow->grade_level = null;
    //     $revertRow->update();
    // }
}
