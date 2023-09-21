<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];


        $regu = User::create(array_merge([
            'name' => 'regu',
            'email' => 'regu@gmail.com',
        ], $default_user_value));

        $spv = User::create(array_merge([
            'name' => 'spv',
            'email' => 'spv@gmail.com',
        ], $default_user_value));

        $manager = User::create(array_merge([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
        ], $default_user_value));

        $admin = User::create(array_merge([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ], $default_user_value));

        // permissions logsheet
        Permission::create(['name' => 'edit logsheet']);
        Permission::create(['name' => 'delete logsheet']);
        Permission::create(['name' => 'read logsheet']);
        Permission::create(['name' => 'create logsheet']);

        // permissions berita acara
        Permission::create(['name' => 'edit beritaacara']);
        Permission::create(['name' => 'delete beritaacara']);
        Permission::create(['name' => 'read beritaacara']);
        Permission::create(['name' => 'create beritaacara']);

        // permission document
        Permission::create(['name' => 'edit document']);
        Permission::create(['name' => 'delete document']);
        Permission::create(['name' => 'read document']);
        Permission::create(['name' => 'create document']);

        // management roles
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);
        Permission::create(['name' => 'read roles']);
        Permission::create(['name' => 'create roles']);

        // management users
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'create users']);

        // management master
        Permission::create(['name' => 'edit master']);
        Permission::create(['name' => 'delete master']);
        Permission::create(['name' => 'read master']);
        Permission::create(['name' => 'create master']);

        // management checklist mesin
        Permission::create(['name' => 'edit checklist mesin']);
        Permission::create(['name' => 'delete checklist mesin']);
        Permission::create(['name' => 'read checklist mesin']);
        Permission::create(['name' => 'create checklist mesin']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role_regu = Role::create(['name' => 'regu']);
        $role_regu->givePermissionTo('create logsheet');

        // or may be done by chaining
        $role_spv = Role::create(['name' => 'spv'])
            ->givePermissionTo(['edit logsheet', 'read logsheet']);

        // or may be done by chaining
        $role_manager = Role::create(['name' => 'manager'])
            ->givePermissionTo(['edit logsheet', 'read logsheet', 'read roles', 'create users', 'read users']);

        $role_admin = Role::create(['name' => 'admin']);
        $role_admin->givePermissionTo(Permission::all());

        $regu->assignRole('regu');
        $spv->assignRole('spv');
        $manager->assignRole('manager');
        $admin->assignRole('admin');
    }
}
