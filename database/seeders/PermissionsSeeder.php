<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'show posts']);
        Permission::create(['name'=>'add posts']);
        Permission::create(['name'=>'edit posts']);
        Permission::create(['name'=>'delete posts']);
        Permission::create(['name'=>'show coment']);
        Permission::create(['name'=>'add coment']);
        Permission::create(['name'=>'edit coment']);
        Permission::create(['name'=>'delete coment']);
        Permission::create(['name'=>'show user']);
        Permission::create(['name'=>'edit user']);
        
    }
}
