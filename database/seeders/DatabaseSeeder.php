<?php

namespace Database\Seeders;

use App\Models\ParentOfStudent;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleTableSeeder::class,
            SubjectSeeder::class,
            UserTableSeeder::class,
            AdminTableSeeder::class,
            TeacherSeeder::class,
            ClassSeeder::class,
            StudentTableSeeder::class,
            ParentTableSeeder::class,
            TeachSeeder::class,
            PointSeeder::class,
        ]);
    }
}
