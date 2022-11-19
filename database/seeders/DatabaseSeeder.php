<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Course;
use App\Models\Lecture;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' =>  '$2y$10$41q8oiO8dfx1q6J5SH2QheZXT4jDYETb0obhKjpdWmTMjNlsRRIP.',//admin123
        ]);
    }
}
