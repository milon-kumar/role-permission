<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::create([
             'type'=>'admin',
             'name' => 'Admin',
             'email' => 'admin@mail.com',
             'password' => Hash::make('admin@mail.com'),
             'is_approve'=>true,
         ]);

         User::create([
             'type'=>'manager',
             'name' => 'Manager',
             'email' => 'manager@mail.com',
             'password' => Hash::make('manager@mail.com'),
             'is_approve'=>true,
         ]);

         User::create([
             'type'=>'employee',
             'name' => 'Employee',
             'email' => 'employee@mail.com',
             'password' => Hash::make('employee@mail.com'),
             'is_approve'=>true,
         ]);

         $this->call([
             RolePermissionSeeder::class,
         ]);
    }
}
