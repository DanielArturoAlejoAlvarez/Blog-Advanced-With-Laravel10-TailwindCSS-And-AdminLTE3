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
        Permission::create(['name'=>'admin.home','description'=>'Dashboard'])->syncRoles([$role1,$role2]);
        
        Permission::create(['name'=>'admin.users.index','description'=>'User List'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.edit','description'=>'Assign Role'])->syncRoles([$role1]);
        
        Permission::create(['name'=>'admin.categories.index','description'=>'Category List'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.categories.create','description'=>'Create Category'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.edit','description'=>'Edit Category'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.categories.destroy','description'=>'Delete Category'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.tags.index','description'=>'Tag List'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.tags.create','description'=>'Create Tag'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.tags.edit','description'=>'Edit Tag'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.tags.destroy','description'=>'Delete Tag'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.posts.index','description'=>'Post List'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.posts.create','description'=>'Create Post'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.posts.edit','description'=>'Edit Post'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.posts.destroy','description'=>'Delete Post'])->syncRoles([$role1,$role2]);

    }
}
