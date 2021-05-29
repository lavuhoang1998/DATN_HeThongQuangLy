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
            ClassSeeder::class,
            SemesterSeeder::class,

            UserTableSeeder::class,
            AdminTableSeeder::class,
            TeacherSeeder::class,
            StudentTableSeeder::class,

            ParentTableSeeder::class,

            HomeRoomTeacherSeeder::class,
            StudySeeder::class,
            TeachSeeder::class,
            HistorySeeder::class,
            PointSeeder::class,
        ]);
    }
}
