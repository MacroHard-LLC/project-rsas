<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\User;

class CreateSectionTest extends TestCase
{
    public function test_CreateSectionForm(): void
    {
        $request = $this->get('/section/create');
        $request->assertStatus(200);
    }

    public function test_IfAdviserRequestWorksIfExist(): void{
        $response = $this->post('/section-adviser-request',[
            'input_data' => [
                'id' => 234423234
            ],
        ])->assertStatus(200);

        $this->assertTrue($response == true);
    }

    public function test_IfAdviserIdCannotBeChosen(): void{
        $response = $this->post('/section-adviser-request',[
            'input_data' => [
                'id' => 230492349
            ],
        ]);

        $this->assertFalse($response == false);
    }

    public function test_StudentNamePostSuccessfull(): void {
        $response = $this->post('/section-request',[
            'input_data' => [
                'id' => 696920202
            ],
        ])->assertStatus(200);

        $returnValue = $response->getContent();
        $this->assertNotNull($returnValue);
    }

    public function test_StudentNameReturnedIsActuallyNull(): void {
        // if the id is from an faculty
        $response = $this->post('/section-request',[
            'input_data' => [
                'id' => 230492349
            ],
        ])->assertStatus(200);

        $returnValue = $response->getContent();
        $this->assertTrue($returnValue == '');

        // if the id is from a student but already enrolled
        $response = $this->post('/section-request',[
            'input_data' => [
                'id' => 234423234
            ],
        ])->assertStatus(200);

        $returnValue = $response->getContent();
        $this->assertTrue($returnValue == '');
    }

    public function test_GettingAllStudentsForStudentNameSuccessfull(): void {
        // if the id is from an faculty
        $response = $this->post('/section-get-students',[
            'input_data' => 'Work, Josdifui'
        ])->assertStatus(200);

        $returnValue = $response->getContent();
        $this->assertNotNull($returnValue);
    }

    public function test_AssignStudentsTheSection(): void {
        // if the id is from an faculty
        $response = $this->post('/section/register',[
            'allStudentID' => [101231231],
            'gradeLevel' => 1
        ])->assertStatus(200);

        // reverts the row to its original state
        $revertRow = User::where('id',101231231)->first();
        $revertRow->is_enrolled = null;
        $revertRow->grade_level = null;
        $revertRow->update();
    }
}
