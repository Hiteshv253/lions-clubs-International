<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run(): void {
            // Create Permissions
            Permission::firstOrCreate(['name' => 'view role', 'guard_name' => 'web']);
            Permission::firstOrCreate(['name' => 'create role', 'guard_name' => 'web']);
            Permission::firstOrCreate(['name' => 'update role', 'guard_name' => 'web']);
            Permission::firstOrCreate(['name' => 'delete role', 'guard_name' => 'web']);

            Permission::firstOrCreate(['name' => 'view permission', 'guard_name' => 'web']);
            Permission::firstOrCreate(['name' => 'create permission', 'guard_name' => 'web']);
            Permission::firstOrCreate(['name' => 'update permission', 'guard_name' => 'web']);
            Permission::firstOrCreate(['name' => 'delete permission', 'guard_name' => 'web']);

            Permission::firstOrCreate(['name' => 'view user', 'guard_name' => 'web']);
            Permission::firstOrCreate(['name' => 'create user', 'guard_name' => 'web']);
            Permission::firstOrCreate(['name' => 'update user', 'guard_name' => 'web']);
            Permission::firstOrCreate(['name' => 'delete user', 'guard_name' => 'web']);

            Permission::firstOrCreate(['name' => 'view product', 'guard_name' => 'web']);
            Permission::firstOrCreate(['name' => 'create product', 'guard_name' => 'web']);
            Permission::firstOrCreate(['name' => 'update product', 'guard_name' => 'web']);
            Permission::firstOrCreate(['name' => 'delete product', 'guard_name' => 'web']);

            // Create Roles
            $superAdminRole = Role::firstOrCreate(['name' => 'super-admin'], ['guard_name' => 'web']);
            $adminRole = Role::firstOrCreate(['name' => 'admin'], ['guard_name' => 'web']);
            $staffRole = Role::firstOrCreate(['name' => 'staff'], ['guard_name' => 'web']);
            $userRole = Role::firstOrCreate(['name' => 'user'], ['guard_name' => 'web']);

            // Lets give all permission to super-admin role.
            $allPermissionNames = Permission::pluck('name')->toArray();

            $superAdminRole->givePermissionTo($allPermissionNames);

            // Let's give few permissions to admin role.
            $adminRole->givePermissionTo(['create role', 'view role', 'update role']);
            $adminRole->givePermissionTo(['create permission', 'view permission']);
            $adminRole->givePermissionTo(['create user', 'view user', 'update user']);
            $adminRole->givePermissionTo(['create product', 'view product', 'update product']);

            // Let's Create User and assign Role to it.

            $superAdminUser = User::firstOrCreate(['email' => 'probsoltechnology@gmail.com',], [
                            'name' => 'Name',
                            'first_name' => 'Admin',
                            'last_name' => 'Admin',
                            'email' => 'probsoltechnology@gmail.com',
                            'password' => Hash::make('Password@1234'),
            ]);

            $superAdminUser->assignRole($superAdminRole);

            $adminUser = User::firstOrCreate(['email' => 'hiteshv253@gmail.com'], [
                            'name' => 'Name',
                            'first_name' => 'Admin',
                            'last_name' => 'Admin',
                            'email' => 'hiteshv253@gmail.com',
                            'password' => Hash::make('Password@1234'),
            ]);

            $adminUser->assignRole($adminRole);

            $staffUser = User::firstOrCreate(['email' => 'sapan@yahoo.in',], [
                            'name' => 'Name',
                            'first_name' => 'Admin',
                            'last_name' => 'Admin',
                            'email' => 'sapan@yahoo.in',
                            'password' => Hash::make('Password@1234'),
            ]);

            $staffUser->assignRole($staffRole);
      }
}
