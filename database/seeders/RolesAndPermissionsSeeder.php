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
            ['firstName' => 'Super','lastName' => 'Admin', 'email' => 'superadmin@example.com', 'password' => Hash::make('password'),'activity' => 'active', 'phone' => '1234567890', 'address' => 'Address 1', 'image' => 'superadmin.jpg'],
            ['firstName' => 'Admin','lastName' => '1', 'email' => 'admin1@example.com', 'password' => Hash::make('password'),'activity' => 'active',  'phone' => '1234567891', 'address' => 'Address 2', 'image' => 'admin1.jpg'],
            ['firstName' => 'Admin','lastName' => '2', 'email' => 'admin2@example.com', 'password' => Hash::make('password'),'activity' => 'active',  'phone' => '1234567892', 'address' => 'Address 3', 'image' => 'admin2.jpg'],
            ['firstName' => 'Admin','lastName' => '3', 'email' => 'admin3@example.com', 'password' => Hash::make('password'),'activity' => 'active',  'phone' => '1234567893', 'address' => 'Address 4', 'image' => 'admin3.jpg'],
            ['firstName' => 'Admin','lastName' => '4', 'email' => 'admin4@example.com', 'password' => Hash::make('password'),'activity' => 'active',  'phone' => '1234567894', 'address' => 'Address 5', 'image' => 'admin4.jpg'],
            ['firstName' => 'Admin','lastName' => '5', 'email' => 'admin5@example.com', 'password' => Hash::make('password'),'activity' => 'active',  'phone' => '1234567895', 'address' => 'Address 6', 'image' => 'admin5.jpg'],
            ['firstName' => 'Admin','lastName' => '6', 'email' => 'admin6@example.com', 'password' => Hash::make('password'),'activity' => 'active',  'phone' => '1234567896', 'address' => 'Address 7', 'image' => 'admin6.jpg'],
            ['firstName' => 'Admin','lastName' => '7', 'email' => 'admin7@example.com', 'password' => Hash::make('password'),'activity' => 'active',  'phone' => '1234567897', 'address' => 'Address 8', 'image' => 'admin7.jpg'],
            ['firstName' => 'Admin','lastName' => '8', 'email' => 'admin8@example.com', 'password' => Hash::make('password'),'activity' => 'active',  'phone' => '1234567898', 'address' => 'Address 9', 'image' => 'admin8.jpg'],
            ['firstName' => 'Admin','lastName' => '9', 'email' => 'admin9@example.com', 'password' => Hash::make('password'),'activity' => 'active',  'phone' => '1234567899', 'address' => 'Address 10', 'image' => 'admin9.jpg'],
            ['firstName' => 'Admin','lastName' => '10', 'email' => 'admin10@example.com', 'password' => Hash::make('password'),'activity' => 'active',  'phone' => '12345678910', 'address' => 'Address 11', 'image' => 'admin10.jpg'],
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
