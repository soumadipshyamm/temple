<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(Request $request): void
    {
        $faker = Faker::create();
        $adminUser = new User();
        $adminUser->uuid = $faker->uuid;
        $adminUser->name = 'Admin';
        $adminUser->username = 'superadmin';
        $adminUser->email = 'admin@abc.com';
        $adminUser->mobile_number = 9191244321;
        $adminUser->email_verified_at = $faker->dateTime();
        $adminUser->mobile_number_verified_at = $faker->dateTime();
        $adminUser->password = bcrypt('12345678');
        $adminUser->registration_ip = $request->getClientIp();
        $adminUser->is_active = 1;
        if ($adminUser->save()) {
            $adminUser->profile()->create([
                'uuid' => $faker->uuid,
                'birthday' => '1993-05-27',
                'gender' => 'male',
            ]);
        }
    }
}
