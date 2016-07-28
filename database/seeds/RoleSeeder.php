<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $owner = new Role();
        $owner->name = 'owner2';
        $owner->display_name = 'Project1 Owner';
        $owner->description = 'User is an owner of a given project';
        $owner->save();

        $owner = new Role();
        $owner->name = 'admin2';
        $owner->display_name = 'Project1 Admin';
        $owner->description = 'User is an Admin of a given project';
        $owner->save();

    }
}
