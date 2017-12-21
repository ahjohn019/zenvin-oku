<?php

use Illuminate\Database\Seeder;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $package = new \App\Package([
            'package_name' => 'Bronze',
            'no_store_own' => '10',
            'no_product_per_store' => '50',
            'price_per_year' => '200.00'
           
        ]);
        $package->save();
        $package = new \App\Package([
            'package_name' => 'Silver',
            'no_store_own' => '20',
            'no_product_per_store' => '100',
            'price_per_year' => '300.00'
           
        ]);
        $package->save();
        $package = new \App\Package([
            'package_name' => 'Golden',
            'no_store_own' => '30',
            'no_product_per_store' => '150',
            'price_per_year' => '400.00'
           
        ]);
        $package->save();
        $package = new \App\Package([
            'package_name' => 'MegaPack',
            'no_store_own' => '50',
            'no_product_per_store' => '300',
            'price_per_year' => '700.00'
           
        ]);
        $package->save();
    }
}
