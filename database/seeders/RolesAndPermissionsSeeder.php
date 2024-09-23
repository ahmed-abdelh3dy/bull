<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // إنشاء تصريح
        $permission = Permission::create(['name' => ' articles']);

        // إنشاء دور
        $role = Role::create(['name' => 'booker']);

        // إسناد تصريح إلى دور
        $role->givePermissionTo($permission);

        // إسناد دور إلى مستخدم
        $user = User::find(1);
        $user->assignRole('booker');
    }
}

