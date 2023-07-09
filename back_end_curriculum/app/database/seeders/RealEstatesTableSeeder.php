<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealEstatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('realestates')->delete();

        $propertyNames = ['サンシャインマンション', 'ムーンライトビル', 'スターライトタワー', 'コスモスアパート', 'プラネットコンド'];
        $breadths = [50, 60, 70, 80, 90];
        $floorPlans = ['1LDK', '2LDK', '3LDK', '3DK', '2DK'];
        $tenancyStatuses = [1, 2, 3, 1, 2];//1：満室、2：空室、3：空き予定

        $accountIds = [5, 10, 15, 20, 21];

        for ($i = 0; $i < 5; $i++) {
            DB::table('realestates')->insert([
                'name' => $propertyNames[$i],
                'address' => 'テスト住所' . ($i + 1),
                'breadth' => $breadths[$i],
                'floor_plan' => $floorPlans[$i],
                'tenancy_status' => $tenancyStatuses[$i],
                'account_id' => $accountIds[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        for ($i = 5; $i < 21; $i++) {
            $propertyName = 'テスト物件' . $i;
            if (!DB::table('realestates')->where('name', $propertyName)->exists()) {
                DB::table('realestates')->insert([
                    'name' => $propertyName,
                    'address' => 'テスト住所' . $i,
                    'breadth' => rand(50, 150),
                    'floor_plan' => rand(1, 5) . 'LDK',
                    'tenancy_status' => rand(1, 3),//1：満室、2：空室、3：空き予定
                    'account_id' => rand(1, 21),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
