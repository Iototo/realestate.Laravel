<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserTableSeeder extends Seeder
{
 /**
 * Run the database seeds.
 *
 * @return void
 */
 public function run()
 {
    if (!DB::table('accounts')->where('email', 'tarosuzuki@example.com')->exists() &&
    !DB::table('accounts')->where('email', 'jirosato@example.com')->exists() &&
    !DB::table('accounts')->where('email', 'saburoishii@example.com')->exists() &&
    !DB::table('accounts')->where('email', 'shirotanaka@example.com')->exists()) {
        User::create([
            'name' => 'Suzuki Taro',
            'email' => 'tarosuzuki@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::create([
            'name' => 'Sato Jiro',
            'email' => 'jirosato@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::create([
            'name' => 'Ishii Saburo',
            'email' => 'saburoishii@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::create([
            'name' => 'Tanaka Shiro',
            'email' => 'shirotanaka@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    $users = [
        [
            'name' => '六名字　六郎',
            'email' => 'rokurorokumyoji@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '2',
        ],

        [
            'name' => '七名字　七郎',
            'email' => 'shichironanamyoji@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '2',
        ],

        [
            'name' => '八名字　八郎',
            'email' => 'hachirohatimyoji@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '2',
        ],

        [
            'name' => '九名字　九朗',
            'email' => 'kurokumyoji@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '2',
        ],

        [
            'name' => 'Ju Ro',
            'email' => 'juro@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '1',
        ],

        [
            'name' => 'Ele Ven',
            'email' => 'eleven@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '2',
        ],

        [
            'name' => 'Twe Lve',
            'email' => 'twelve@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '1',
        ],

        [
            'name' => 'Thir Teen',
            'email' => 'thirteen@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '2',
        ],

        [
            'name' => 'Four Teen',
            'email' => 'fourteen@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '1',
        ],

        [
            'name' => 'Fif Teen',
            'email' => 'jirosato@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '2',
        ],

        [
            'name' => 'Six Teen',
            'email' => 'sixteen@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '1',
        ],

        [
            'name' => 'Seven Teen',
            'email' => 'seventeen@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '2',
        ],

        [
            'name' => 'Eigh Teen',
            'email' => 'eighteen@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '2',
        ],

        [
            'name' => 'Nine Teen',
            'email' => 'nineteen@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '1',
        ],

        [
            'name' => 'Twen Ty',
            'email' => 'twenty@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '2',
        ],

        [
            'name' => 'Twenty One',
            'email' => 'twentyone@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '1',
        ],

        [
            'name' => 'Twenty Two',
            'email' => 'twntytwo@example.com',
            'password' => Hash::make('password'),
            'tel' => '09012345678',
            'role' => '2',
        ],
    ];

    foreach ($users as $user) {
        if (!DB::table('accounts')->where('email', $user['email'])->exists()) {
            User::create(array_merge($user, ['created_at' => now(), 'updated_at' => now()]));
        }
    }
 }
}



