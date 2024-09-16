<?php 

namespace Database\Seeders;

use App\Models\User;
use App\Models\School; // Import the School model
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default school
        $school = School::create([
            'name' => 'Default School',
            'slug' => 'default-school',
        ]);

        // Create users
        $user1 = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create a role and associate it with the default school
        $role = Role::create([
            'name' => 'Admin',
            'school_id' => $school->id, // Associate the role with the school
        ]);

        $user1->assignRole($role);
    }
}
