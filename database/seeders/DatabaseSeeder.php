<?php

namespace Database\Seeders;

use App\Jobs\ProcessDownloadImages;
use App\Models\Coment;
use App\Models\Post;
use App\Models\User;
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
        dispatch(new ProcessDownloadImages("https://pixabay.com/api/?key=30901572-740c7ca13b59d9ea5b312c9a3&category=travel&image_type=photo", "NXLhsbyvDNRmGDJL1mjt5zVlzTt1VnFL"));
        User::factory(10)->create();
        Post::factory(100)->create();
        Coment::factory(1000)->create();

        (new CreateSuperAdminSeeder)->run();

        (new PermissionsSeeder)->run();

        (new RoleUserSeeder)->run();
    }
}
