<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Role model from Spatie-Permission
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name'=>'ADMIN']);
        $role2 = Role::create(['name'=>'BLOGGER']);

        //TODO: assingRole method from Spatie methods
        //** Single role */
        //** $role->givePermissionTo($permission);*/ 
        //** permission->assignRole($role); */
        //** Various roles  */
        //** permission->syncRoles($role); */
        Permission::create(['name'=>'admin.home'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.categories.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.categories.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.categories.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.categories.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'admin.tags.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.tags.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.tags.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.tags.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'admin.posts.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.posts.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.posts.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.posts.destroy'])->syncRoles([$role1,$role2]);

    }
}
