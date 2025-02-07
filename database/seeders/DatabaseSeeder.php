<?php

// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 10 teachers
        Teacher::factory(10)->create();

        // Create 50 students and associate each with a teacher
        Student::factory(50)->create();
    }
}
