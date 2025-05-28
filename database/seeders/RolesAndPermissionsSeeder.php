<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder {

      public function run() {
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

            // Create Permissions
            Permission::create(['name' => 'edit articles']);
            Permission::create(['name' => 'delete articles']);
            Permission::create(['name' => 'publish articles']);

            // Create Roles and assign existing permissions
            $writer = Role::create(['name' => 'writer']);
            $writer->givePermissionTo('edit articles');

            $admin = Role::create(['name' => 'admin']);
            $admin->givePermissionTo(Permission::all());
      }
}
