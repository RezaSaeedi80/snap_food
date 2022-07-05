<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class BasicRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $seller = Role::create(['name' => 'seller']);
        $buyer = Role::create(['name' => 'buyer']);

        // $create_resturant = Permission::create(['name' => 'create resturant']);
        $add_offer = Permission::create(['name' => 'add offer']);
        $admin->givePermissionTo($add_offer);
        // $set_working_time = Permission::create(['name' => 'set working time']);
        // $edit_working_time = Permission::create(['name' => 'edit working time']);

        // $seller->givePermissionTo($create_resturant);
        // $seller->givePermissionTo($set_working_time);
    }
}
