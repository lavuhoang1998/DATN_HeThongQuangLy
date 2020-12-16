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
            UserTableSeeder::class,
            StudentTableSeeder::class,
            AdminTableSeeder::class,
            ParentTableSeeder::class,
        ]);
    }
}
