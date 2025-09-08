<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dynamic permissions
        $entities = ['category', 'brand', 'product'];
        $actions = ['create', 'view', 'edit', 'delete'];

        foreach ($entities as $entity) {
            foreach ($actions as $action) {
                Permission::firstOrCreate([
                    'name' => $action . '_' . $entity, // e.g., create_category
                    'guard_name' => 'web',
                ]);
            }
        }

        // Static permissions
        $staticPermissions = [
            'view_dashboard',
            'edit_settings',
            'view_settings',
        ];

        foreach ($staticPermissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}
