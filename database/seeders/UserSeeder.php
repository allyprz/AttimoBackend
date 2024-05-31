<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John',
            'lastname1' => 'Doe',
            'lastname2' => 'Smith',
            'email' => 'john@example.com',
            'username' => 'johndoe',
            'password' => 'qwerty123',
            'image' => "https://randomuser.me/api/portraits/men/1.jpg",
            'users_types_id' => 3,
        ]);
        
        User::create([
            'name' => 'Mary',
            'lastname1' => 'Johnson',
            'lastname2' => 'Brown',
            'email' => 'mary@example.com',
            'username' => 'maryjohnson',
            'password' => 'password123',
            'image' => "https://randomuser.me/api/portraits/women/1.jpg",
            'users_types_id' => 2,
        ]);
        
        User::create([
            'name' => 'Peter',
            'lastname1' => 'Williams',
            'lastname2' => 'Jones',
            'email' => 'peter@example.com',
            'username' => 'peterwilliams',
            'password' => 'abc123',
            'image' => "https://randomuser.me/api/portraits/men/2.jpg",
            'users_types_id' => 1,
        ]);
        
        User::create([
            'name' => 'Anna',
            'lastname1' => 'Davis',
            'lastname2' => 'Miller',
            'email' => 'anna@example.com',
            'username' => 'annadavis',
            'password' => 'xyz456',
            'image' => "https://randomuser.me/api/portraits/women/2.jpg",
            'users_types_id' => 2,
        ]);
        
        User::create([
            'name' => 'Charles',
            'lastname1' => 'Garcia',
            'lastname2' => 'Martinez',
            'email' => 'charles@example.com',
            'username' => 'charlesgarcia',
            'password' => 'password789',
            'image' => "https://randomuser.me/api/portraits/men/3.jpg",
            'users_types_id' => 1,
        ]);
        
        User::create([
            'name' => 'Laura',
            'lastname1' => 'Lopez',
            'lastname2' => 'Hernandez',
            'email' => 'laura@example.com',
            'username' => 'lauralopez',
            'password' => 'pass123',
            'image' => "https://randomuser.me/api/portraits/women/3.jpg",
            'users_types_id' => 2,
        ]);
        
        User::create([
            'name' => 'George',
            'lastname1' => 'Clark',
            'lastname2' => 'Lewis',
            'email' => 'george@example.com',
            'username' => 'georgeclark',
            'password' => 'password123',
            'image' => "https://randomuser.me/api/portraits/men/4.jpg",
            'users_types_id' => 1,
        ]);
        
        User::create([
            'name' => 'Elena',
            'lastname1' => 'Roberts',
            'lastname2' => 'Walker',
            'email' => 'elena@example.com',
            'username' => 'elenaroberts',
            'password' => 'abc456',
            'image' => "https://randomuser.me/api/portraits/women/4.jpg",
            'users_types_id' => 2,
        ]);
        
        User::create([
            'name' => 'Paul',
            'lastname1' => 'Harris',
            'lastname2' => 'Young',
            'email' => 'paul@example.com',
            'username' => 'paulharris',
            'password' => 'xyz789',
            'image' => "https://randomuser.me/api/portraits/men/5.jpg",
            'users_types_id' => 1,
        ]);
        
        User::create([
            'name' => 'Sophia',
            'lastname1' => 'King',
            'lastname2' => 'Scott',
            'email' => 'sophia@example.com',
            'username' => 'sophiaking',
            'password' => 'password789',
            'image' => "https://randomuser.me/api/portraits/women/5.jpg",
            'users_types_id' => 2,
        ]);
        
    }
}
