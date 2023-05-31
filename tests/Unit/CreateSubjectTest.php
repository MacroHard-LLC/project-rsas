<?php

namespace Tests\Unit;

use App\Models\Subject_table;
use App\Models\Machine_table;
use App\Models\Schedule_table;

use Tests\TestCase;
//use PHPUnit\Framework\TestCase;

class CreateSubjectTest extends TestCase
{
    // /**
    //  * A basic unit test example.
    //  */
    // public function test_CreateSubjectForm(): void
    // {
    //     $response = $this->get('/subjects/create');
    //     $response->assertStatus(200);
    // }

    // public function test_Check_Subject_Id_inserts(): void
    // {
    //     $subject = Subject_table::make([
    //         'id' => 44355,
    //         'grade_level' => 4,
    //         'name' => 'Flowers and Alchemy',
    //         'instructor_id' => 123123123,
    //         'room' => 'AS 123',
    //         'year_start' => '2000-01-01',
    //         'year_end' => '2001-12-31',
    //         'added_on' => '2023-04-10 01:01:01',
    //         'added_by' => '0',
    //         'is_deleted' => 0
    //     ]);

    //     $subject->save();
    //     $insertedSubject = Subject_table::find(44355);
    //     $this->assertNotNull($insertedSubject);
    // }

    // public function test_CheckSubjectDelete(): void{
    //     $insertedSubject = Subject_table::find(44355);
    //     $this->assertNotNull($insertedSubject);
    //     $insertedSubject->delete();
    // }

    // public function test_CheckDuplicateId(): void{
    //     $subject1 = Subject_table::make([
    //         'id' => 44855,
    //         'grade_level' => 4,
    //         'name' => 'Flowers and Alchemy',
    //         'instructor_id' => 123123123,
    //         'room' => 'AS 123',
    //         'year_start' => '2000-01-01',
    //         'year_end' => '2001-12-31',
    //         'added_on' => '2023-04-10 01:01:01',
    //         'added_by' => '0',
    //         'is_deleted' => 0
    //     ]);

    //     $subject1->save();

    //     $subject2 = Subject_table::make([
    //         'id' => 44855,
    //         'grade_level' => 4,
    //         'name' => 'Flowers and Alchemy',
    //         'instructor_id' => 123123123,
    //         'room' => 'AS 123',
    //         'year_start' => '2000-01-01',
    //         'year_end' => '2001-12-31',
    //         'added_on' => '2023-04-10 01:01:01',
    //         'added_by' => '0',
    //         'is_deleted' => 0
    //     ]);

    //     $insertedSubject = Subject_table::find(44855);

    //     $this->assertTrue($insertedSubject->id == $subject2->id);
    //     $insertedSubject->delete();
    // }

    // public function test_IfPostWorks():void{
    //     $response = $this->post('/subjects',[
    //         'sub_id' => 83855,
    //         'grade_level' => 4,
    //         'sub_name' => 'Flowers and Alchemy',
    //         'instructor_id' => 12123123,
    //         'room' => 'AS 123',
    //         'time_st' => '01:00:00',
    //         'time_end' => '02:00:00',
    //         'days' => 'MON',
    //         'as_room' => 'RM 202',
    //         'year_st' => '2000-01-01',
    //         'year_end' => '2001-12-31',
    //         'added_on' => '2023-04-10 01:01:01',
    //         'added_by' => '0',
    //         'is_deleted' => 0
    //     ]);

    //     $response->assertStatus(200);

    //     // something with the model but hng do not have the time
    //     $incomingMachine = Machine_table::latest('id');
    //     $incomingSchedule = Schedule_table::where('subject_id',83855);
    //     $incomingSubject = Subject_table::find(83855);
    //     $incomingMachine->delete();
    //     $incomingSchedule->delete();
    //     $incomingSubject->delete();
    // }
    }
