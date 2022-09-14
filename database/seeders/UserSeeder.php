<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'read-data']);
        Permission::create(['name' => 'create-data']);
        Permission::create(['name' => 'update-data']);
        Permission::create(['name' => 'delete-data']);

        $roleSuAdmin = Role::create(['name' => 'super-admin']);
        $roleSuAdmin->givePermissionTo('read-data');
        $roleSuAdmin->givePermissionTo('create-data');
        $roleSuAdmin->givePermissionTo('update-data');
        $roleSuAdmin->givePermissionTo('delete-data');

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo('read-data');
        $roleAdmin->givePermissionTo('create-data');
        $roleAdmin->givePermissionTo('update-data');

        $roleKades = Role::create(['name' => 'kades']);
        $roleKades->givePermissionTo('read-data');

        $data = array(
            [
                'nama' => 'Super Admin',
                'username' => 'Super Admin',
                'password' => Hash::make('MZs2ZBZ3RzBaz7G8'),
                'role' => 'super-admin'
            ],
            [
                'nama' => 'Admin',
                'username' => 'Admin',
                'password' => Hash::make('cP2FsL7Qugyb2auC'),
                'role' => 'admin'
            ],
            [
                'nama' => 'Kepala Desa',
                'username' => 'Kades',
                'password' => Hash::make('MZDgQmfs65WSh29w'),
                'role' => 'kades'
            ],
        );

        foreach ($data as $key => $value) {
            $user = User::create([
                'nama' => $value['nama'],
                'username' => $value['username'],
                'password' => $value['password']
            ]);

            $user->assignRole($value['role']);
        }
    }
}
