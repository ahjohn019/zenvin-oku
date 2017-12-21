<?php

use Illuminate\Database\Seeder;

class OrgTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organization = new \App\Organization([
            'name' => 'Orphan Care Sdn Bhd',
            'desc' => 'A normal orphan house',
            'addr' => 'Cheras',
            'region' => 'Kuala Lumpur',
            'phone_no' => '011-1234567', 
            'reg_date' => '2015-5-16',
            'image' => '1508940236.jpg'
        ]);
        $organization->save();
        $organization = new \App\Organization([
            'name' => 'Operation Orphan Sdn Bhd',
            'desc' => 'A good orphan house',
            'addr' => 'Setapak',
            'region' => 'Kuala Lumpur',
            'phone_no' => '011-1301533', 
            'reg_date' => '2017-4-16',
            'image' => '1508940349.png'
        ]);
        $organization->save();
        $organization = new \App\Organization([
            'name' => 'Ti-Ratana Sdn Bhd',
            'desc' => 'A normal malay orphan house',
            'addr' => 'Ampang',
            'region' => 'Kuala Lumpur',
            'phone_no' => '011-11305427', 
            'reg_date' => '2016-5-18',
            'image' => '1508940482.jpg'
        ]);
        $organization->save();//
    }
}
