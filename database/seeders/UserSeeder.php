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
        // Administradores (users_type 3)
        User::create([
            'name' => 'John',
            'lastname1' => 'Doe',
            'lastname2' => 'Smith',
            'email' => 'john@example.com',
            'username' => 'johndoe',
            'password' => 'qwerty123',
            'image' => "image.jpg",
            'users_types_id' => 3,
        ]);

        // Estudiantes (users_type 1)
        User::create([
            'name' => 'Peter',
            'lastname1' => 'Williams',
            'lastname2' => 'Jones',
            'email' => 'peter@example.com',
            'username' => 'peterwilliams',
            'password' => 'abc123',
            'image' => "image.jpg",
            'users_types_id' => 1,
        ]);

        User::create([
            'name' => 'Mary',
            'lastname1' => 'Johnson',
            'lastname2' => 'Brown',
            'email' => 'mary@example.com',
            'username' => 'maryjohnson',
            'password' => 'password123',
            'image' => "image.jpg",
            'users_types_id' => 1,
        ]);

        User::create([
            'name' => 'Anna',
            'lastname1' => 'Davis',
            'lastname2' => 'Miller',
            'email' => 'anna@example.com',
            'username' => 'annadavis',
            'password' => 'xyz456',
            'image' => "image.jpg",
            'users_types_id' => 1,
        ]);

        User::create([
            'name' => 'Charles',
            'lastname1' => 'Garcia',
            'lastname2' => 'Martinez',
            'email' => 'charles@example.com',
            'username' => 'charlesgarcia',
            'password' => 'password789',
            'image' => "image.jpg",
            'users_types_id' => 1,
        ]);

        User::create([
            'name' => 'Laura',
            'lastname1' => 'Lopez',
            'lastname2' => 'Hernandez',
            'email' => 'laura@example.com',
            'username' => 'lauralopez',
            'password' => 'pass123',
            'image' => "image.jpg",
            'users_types_id' => 1,
        ]);

        User::create([
            'name' => 'George',
            'lastname1' => 'Clark',
            'lastname2' => 'Lewis',
            'email' => 'george@example.com',
            'username' => 'georgeclark',
            'password' => 'password123',
            'image' => "image.jpg",
            'users_types_id' => 1,
        ]);

        User::create([
            'name' => 'Elena',
            'lastname1' => 'Roberts',
            'lastname2' => 'Walker',
            'email' => 'elena@example.com',
            'username' => 'elenaroberts',
            'password' => 'abc456',
            'image' => "image.jpg",
            'users_types_id' => 1,
        ]);

        User::create([
            'name' => 'Paul',
            'lastname1' => 'Harris',
            'lastname2' => 'Young',
            'email' => 'paul@example.com',
            'username' => 'paulharris',
            'password' => 'xyz789',
            'image' => "image.jpg",
            'users_types_id' => 1,
        ]);

        User::create([
            'name' => 'Sophia',
            'lastname1' => 'King',
            'lastname2' => 'Scott',
            'email' => 'sophia@example.com',
            'username' => 'sophiaking',
            'password' => 'password789',
            'image' => "image.jpg",
            'users_types_id' => 1,
        ]);

        // Profesores (users_type 2)
        User::create([
            'name' => 'Karl',
            'lastname1' => 'Jinn',
            'lastname2' => 'Cuy',
            'email' => 'Karl@example.com',
            'username' => 'karljinn',
            'password' => 'password709',
            'image' => "image.jpg",
            'users_types_id' => 2,
        ]);

        User::create([
            'name' => 'Pamm',
            'lastname1' => 'Kirsh',
            'lastname2' => 'Stown',
            'email' => 'pamm@example.com',
            'username' => 'pammkirsh',
            'password' => 'passwor7d789',
            'image' => "image.jpg",
            'users_types_id' => 2,
        ]);

        User::create([
            'name' => 'Peter',
            'lastname1' => 'Yuaqa',
            'lastname2' => 'Poluy',
            'email' => 'peter@example.com',
            'username' => 'peteryuaqa',
            'password' => 'pas1ssword789',
            'image' => "image.jpg",
            'users_types_id' => 2,
        ]);

        User::create([
            'name' => 'Betta',
            'lastname1' => 'Lummens',
            'lastname2' => 'Rwell',
            'email' => 'justin@example.com',
            'username' => 'justinlummens',
            'password' => 'password7as89',
            'image' => "image.jpg",
            'users_types_id' => 2,
        ]);

        User::create([
            'name' => 'Lewis',
            'lastname1' => 'Hamilton',
            'lastname2' => 'Ety',
            'email' => 'lewis@example.com',
            'username' => 'lewishamilton',
            'password' => 'password784r9',
            'image' => "image.jpg",
            'users_types_id' => 1,
        ]);
    }
}
