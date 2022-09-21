<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Coment;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(25)->create();
        Post::factory(1250)->create();
        Coment::factory(6250)->create();

        CreateSuperAdminSeeder::run();

        PermissionsSeeder::run();

        RoleUserSeeder::run();
    }
}
