<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name'=>'Academic Code ',
            'contact_num'=>'+5972 597137701',
            'contact_email'=>'info@acadmic.com',
            'address'=>'Palistain'
        ]);
    }
}
