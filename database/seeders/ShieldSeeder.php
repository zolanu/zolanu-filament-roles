<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"district_council","guard_name":"web","permissions":["view_farmer","view_any_farmer","create_farmer","update_farmer","restore_farmer","restore_any_farmer","replicate_farmer","reorder_farmer","delete_farmer","delete_any_farmer","force_delete_farmer","force_delete_any_farmer","view_measurement::unit","view_any_measurement::unit","create_measurement::unit","update_measurement::unit","restore_measurement::unit","restore_any_measurement::unit","replicate_measurement::unit","reorder_measurement::unit","delete_measurement::unit","delete_any_measurement::unit","force_delete_measurement::unit","force_delete_any_measurement::unit","view_vegetable","view_any_vegetable","create_vegetable","update_vegetable","restore_vegetable","restore_any_vegetable","replicate_vegetable","reorder_vegetable","delete_vegetable","delete_any_vegetable","force_delete_vegetable","force_delete_any_vegetable","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user"]},{"name":"super_admin","guard_name":"web","permissions":["view_farmer","view_any_farmer","create_farmer","update_farmer","restore_farmer","restore_any_farmer","replicate_farmer","reorder_farmer","delete_farmer","delete_any_farmer","force_delete_farmer","force_delete_any_farmer","view_measurement::unit","view_any_measurement::unit","create_measurement::unit","update_measurement::unit","restore_measurement::unit","restore_any_measurement::unit","replicate_measurement::unit","reorder_measurement::unit","delete_measurement::unit","delete_any_measurement::unit","force_delete_measurement::unit","force_delete_any_measurement::unit","view_vegetable","view_any_vegetable","create_vegetable","update_vegetable","restore_vegetable","restore_any_vegetable","replicate_vegetable","reorder_vegetable","delete_vegetable","delete_any_vegetable","force_delete_vegetable","force_delete_any_vegetable","view_district","view_any_district","create_district","update_district","restore_district","restore_any_district","replicate_district","reorder_district","delete_district","delete_any_district","force_delete_district","force_delete_any_district","view_role","view_any_role","create_role","update_role","delete_role","delete_any_role","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user"]},{"name":"local_council","guard_name":"web","permissions":["view_farmer","view_any_farmer","create_farmer","update_farmer","restore_farmer","restore_any_farmer","replicate_farmer","reorder_farmer","delete_farmer","delete_any_farmer","view_measurement::unit","view_any_measurement::unit","create_measurement::unit","update_measurement::unit","restore_measurement::unit","restore_any_measurement::unit","replicate_measurement::unit","reorder_measurement::unit","view_any_vegetable","view_any_district"]},{"name":"panel_user","guard_name":"web","permissions":[]}]';
        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn ($permission) => $permissionModel::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
