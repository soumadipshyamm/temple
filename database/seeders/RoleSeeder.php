<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json  = file_get_contents(database_path().'/data/roles.json');
        $data  = json_decode($json);
        foreach ($data->roles as $key => $value) {
            Role::updateOrCreate([
                'name'=> $value->name,
                'short_code'=> $value->short_code,
                'role_type'=> $value->role_type
            ]);
        }
    }
}
