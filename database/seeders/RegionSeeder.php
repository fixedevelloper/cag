<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // $country=Country::query()->firstWhere(['iso'=>'CM']);
        DB::table('regions')->insert(array (
            0 =>
                array (

                   // 'country_id' => $country->id,
                    'name' => 'Littoral',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ),
            1 =>
                array (

                   // 'country_id' => $country->id,
                    'name' => 'Center',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ),
            2 =>
                array (

                   // 'country_id' => $country->id,
                    'name' => 'West',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ),
            3 =>
                array (
                   // 'country_id' => $country->id,
                    'name' => 'East',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ),
            5 =>
                array (

                  //  'country_id' => $country->id,
                    'name' => 'South',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ),
            6 =>
                array (

                   // 'country_id' => $country->id,
                    'name' => 'South West',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ),
            7 =>
                array (

                  //  'country_id' => $country->id,
                    'name' => 'North West',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ),
            8 =>
                array (
                  //  'country_id' => $country->id,
                    'name' => 'North',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ),
            9 =>
                array (
                  //  'country_id' => $country->id,
                    'name' => 'Far north',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ),

            ));
    }
}
