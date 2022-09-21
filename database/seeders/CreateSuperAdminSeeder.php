<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
class CreateSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin=User::create([
        'name'=> 'Admin',
        'email'=> 'admin@gmail.com',
        'user_name'=>'super_puper_admin',
        'city'=> 'Lutsk',
        'Street'=> 'Free',
        'Phone'=> '0999998888',
        'password'=> Hash::make('admin'),
        ]);

        Role::create([
            'name' => 'super-admin',
        ]);

        $superAdmin->assignRole('super-admin');
    }
}
