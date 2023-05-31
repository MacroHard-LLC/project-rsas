<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Tests\TestCase;

class AdminUserTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;
    
    public function test_admin_can_manage_users()
    {
        // Create an admin user
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        // Simulate admin user login
        $this->actingAs($admin);

        // Visit the /users link
        $response = $this->get('/users');

        // Assert that the response is successful and the user table is visible
        $response->assertSuccessful();
        $response->assertSee('USER LIST');

        // Retrieve some users from the database
        $users = User::where('role', '<>', 'admin')->limit(5)->get();

        // Assert that the users are displayed in the table
        foreach ($users as $user) {
            $response->assertSee($user->id);
            $response->assertSee($user->role);
            $response->assertSee($user->first_name);
            $response->assertSee($user->middle_name);
            $response->assertSee($user->last_name);
            $response->assertSee($user->sex);
        }

        // Select some users to edit
        $usersToEdit = $users->take(2);

        // Perform editing for each selected user
        foreach ($usersToEdit as $user) {
            // Visit the edit user page
            $editResponse = $this->get("/users/{$user->id}/edit");

            // Assert that the edit user page is visible
            $editResponse->assertSuccessful();
            $editResponse->assertSee('EDIT USER');

            // Make changes to the user's details (e.g., first name and last name)
            $updatedFirstName = 'Updated First Name';
            $updatedLastName = 'Updated Last Name';

            // Send the form to update the user
            $updateResponse = $this->put("/users/{$user->id}", [
                'first_name' => $updatedFirstName,
                'last_name' => $updatedLastName,
            ]);

            // Assert that the update was successful
            $updateResponse->assertRedirect('/users');
            $this->assertDatabaseHas('user', [
                'id' => $user->id,
                'first_name' => $updatedFirstName,
                'last_name' => $updatedLastName,
            ]);
        }

        // Select some users to delete
        $usersToDelete = $users->take(1);

        // Perform deletion for each selected user
        foreach ($usersToDelete as $user) {
            // Send the delete request for the user
            $deleteResponse = $this->delete("/users/{$user->id}");

            // Assert that the delete was successful
            $deleteResponse->assertRedirect('/users');
            $this->assertDatabaseMissing('user', [
                'id' => $user->id,
            ]);
        }
    }
}
