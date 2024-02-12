<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = 1;
        $permissions = Permission::All();
        for ($i = 1; $i <= count($permissions); $i++) {
            DB::table('users_permissions')->insert([
                'user_id' => $userId,
                'permission_id' => $i
            ]);
            // print_r($i);
        }

    }
}
