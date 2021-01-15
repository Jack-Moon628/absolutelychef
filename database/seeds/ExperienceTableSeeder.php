<?php

use App\Experience;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $experiences = getExperiences();
        foreach ($experiences as $key => $value) {
            Experience::create([
                'name' => $value
            ]);
        }

    }
}
