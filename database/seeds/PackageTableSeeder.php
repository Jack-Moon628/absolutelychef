<?php

use App\Enums\PackageTypeEnums;
use App\helper\PackagesList;
use App\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('packages')->insert(
            PackagesList::WAITING
        );
        
        DB::table('packages')->insert(
            PackagesList::PROFESSIONAL
        );

        DB::table('packages')->insert(PackagesList::ENTERPRISE);

    }
}
