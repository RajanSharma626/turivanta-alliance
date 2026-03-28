<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Application;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name' => 'John',
                'last_name' => 'Wick',
                'name' => 'John Wick',
                'email' => 'john@continental.com',
                'password' => Hash::make('password'),
                'contact_no' => '9876543210',
                'business_type' => 'Travel Agent',
                'country_concerned' => 'India',
                'email_verified_at' => now(),
                'legal_status' => 'Proprietorship',
                'company_name' => 'Continental Travels'
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'name' => 'Jane Doe',
                'email' => 'jane@travels.com',
                'password' => Hash::make('password'),
                'contact_no' => '9876543211',
                'business_type' => 'Tour Operator',
                'country_concerned' => 'USA',
                'email_verified_at' => now(),
                'legal_status' => 'Private Limited',
                'company_name' => 'Global Tours'
            ],
            [
                'first_name' => 'Alice',
                'last_name' => 'Smith',
                'name' => 'Alice Smith',
                'email' => 'alice@student.com',
                'password' => Hash::make('password'),
                'contact_no' => '9876543212',
                'business_type' => 'Student',
                'country_concerned' => 'UAE',
                'email_verified_at' => now(),
                'legal_status' => 'Student',
                'company_name' => 'Tourism Institute'
            ]
        ];

        foreach ($users as $userData) {
            $companyName = $userData['company_name'];
            unset($userData['company_name']);
            
            $user = User::create($userData);
            
            Application::create([
                'user_id' => $user->id,
                'application_no' => 'APP' . rand(1000, 9999),
                'legal_name' => $companyName,
                'legal_status' => $user->legal_status,
                'status' => 'approved'
            ]);
        }
    }
}
