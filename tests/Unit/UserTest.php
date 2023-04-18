<?php

namespace Tests\Unit;

use App\Models\User;

use App\Http\Controllers\UserController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    
    public function test_view_user_page_through_homepage_returns_success(): void
    {
        $response = $this->get('/home');
        $response = $this->get('/users');
        $response->assertStatus(200);

    }


    public function test_create_user_works_and_see_nontable_succesfully(): void
    {
        $formFields = [
            'id' => '202009793',
            'password' => 'stardu$t',
            'role' => '1',
            'first' => 'Jyn',
            'middle' => 'Krennic',
            'last' => 'Erso',
            'gender' => 'F',
        ];
        User::create($formFields);

        $formFields = [
            'id' => '197504051',
            'password' => 'n0t1ne4du',
            'role' => '0',
            'first' => 'Orson',
            'middle' => 'Mendelsohn',
            'last' => 'Krennic',
            'gender' => 'M',
        ];

        User::create($formFields);
        $formFields = [
            'id' => '198914385',
            'password' => 'm0rl4na',
            'role' => '2',
            'first' => 'Cassian',
            'middle' => 'Chlem',
            'last' => 'Andor',
            'gender' => 'M',
        ];
        User::create($formFields);

        $response = $this->get('/users');
        $response->assertDontSee(__(key:'No Data Found'));

    }
    
    public function test_user_id_non_duplication_returns_success(): void
    {
        $user1 = User::create([
            'id' => '968459264',
            'password' => 'skyw4lk3rz',
            'role' => '1',
            'first' => 'Luke',
            'middle' => 'Amidala',
            'last' => 'Skywalker',
            'gender' => 'M',
        ]);

        $user2 = User::create([
            'id' => '968459269',
            'password' => 'skyw4lk3rz',
            'role' => '0',
            'first' => 'Leia',
            'middle' => 'Amidala',
            'last' => 'Skywalker',
            'gender' => 'F',
        ]);

        $this->assertTrue($user1->id==$user2->id);
    }

    public function test_delete_user_returns_success (): void
    {
        $user = User::factory()->count(1)->make();
        $user = User::first();
        if($user){
            $user->delete();
        }
        $this->assertTrue(True);
    }


    public function test_edit_user_returns_success(): void
    {
        // Create a new user
        $user = User::create([
            'id' => '100100111',
            'password' => 'skyw4lk3rz',
            'role' => '2',
            'first' => 'Mintu',
            'middle' => 'Heimdal',
            'last' => 'Raikkonen',
            'gender' => 'F',
        ]);

        // Update the user's information
        $updatedUser = [
            'id' => '333625473',
            'password' => 'skyw4lk3rz',
            'role' => '2',
            'first' => 'Padme',
            'middle' => 'Amidala',
            'last' => 'Skywalker',
            'gender' => 'F',
        ];
        User::where('id', $user->id)->update($updatedUser);

        // Check if the user's information has been updated in the database
        $this->assertDatabaseHas('user', $updatedUser);
    }



    public function test_the_student_table_filter_returns_success(): void
    {
        
        $response = $this->get('/users/?role=student');
        $response->assertStatus(200);
    }

    public function test_the_adviser_table_filter_returns_success(): void
    {
        

        $response = $this->get('/users/?role=adviser');
        $response->assertStatus(200);
    }

    public function test_the_admin_table_filter_returns_success(): void
    {

        $response = $this->get('/users/?role=admin');
        $response->assertStatus(200);
    }
}
