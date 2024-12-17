<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
// Create roles if they don't exist
        $superAdminRole = Role::firstOrCreate(['name' => 'super admin']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);  // New user role

// Create users and assign roles
        $usersData = [
            ['name' => 'Super Admin', 'email' => 'superadmin@example.com', 'password' => Hash::make('password'), 'phone' => '1234567890', 'address' => 'Address 1', 'image' => 'superadmin.jpg'],
            ['name' => 'Admin 1', 'email' => 'admin1@example.com', 'password' => Hash::make('password'), 'phone' => '1234567891', 'address' => 'Address 2', 'image' => 'admin1.jpg'],
            ['name' => 'Admin 2', 'email' => 'admin2@example.com', 'password' => Hash::make('password'), 'phone' => '1234567892', 'address' => 'Address 3', 'image' => 'admin2.jpg'],
            ['name' => 'Admin 3', 'email' => 'admin3@example.com', 'password' => Hash::make('password'), 'phone' => '1234567893', 'address' => 'Address 4', 'image' => 'admin3.jpg'],
            ['name' => 'Admin 4', 'email' => 'admin4@example.com', 'password' => Hash::make('password'), 'phone' => '1234567894', 'address' => 'Address 5', 'image' => 'admin4.jpg'],
            ['name' => 'Admin 5', 'email' => 'admin5@example.com', 'password' => Hash::make('password'), 'phone' => '1234567895', 'address' => 'Address 6', 'image' => 'admin5.jpg'],
            ['name' => 'admin 6', 'email' => 'admin6@example.com', 'password' => Hash::make('password'), 'phone' => '1234567896', 'address' => 'Address 7', 'image' => 'admin6.jpg'],
        ];

// Assign roles to users
        foreach ($usersData as $index => $userData) {
            $user = User::create($userData);

            if ($index == 0) {
                // Assign the first user as super admin
                $user->assignRole($superAdminRole);
            } else  {
                // Assign the next users as admins
                $user->assignRole($adminRole);
            }
        }

    }
}
