<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Reset cached roles and permissions
          app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

          // create permissions
          Permission::create(['name' => 'edit']);
          Permission::create(['name' => 'delete']);
          Permission::create(['name' => 'create']);
          Permission::create(['name' => 'show']);

          // create roles and assign created permissions

          // this can be done as separate statements
          $AdminRole = Role::create(['name' => 'admin']);
          $ClientRole = Role::create(['name' => 'client']);
          $ManagerRole = Role::create(['name' => 'manager']);
          $StaffRole = Role::create(['name' => 'staff']);
          $SpaOwnerRole = Role::create(['name' => 'spaOwner']);

          $ClientRole->givePermissionTo('edit');

          // or may be done by chaining
          $role = Role::create(['name' => 'moderator'])
              ->givePermissionTo(['publish articles', 'unpublish articles']);

          $role = Role::create(['name' => 'super-admin']);
          $role->givePermissionTo(Permission::all());
      }

}
