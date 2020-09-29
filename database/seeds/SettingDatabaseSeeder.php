<?php

use Illuminate\Database\Seeder;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Setting::setMany([
            'default_local' => 'ar',
            'default_timezone' => 'Africa/Cairo',
            'reviews_enable' => true,
            'auto_approve_reviews' => true,
            'supported_currencies' => ['USA' , 'SAR'],
            'store_email' => 'admin@ecommerce.com',
            'search_engine' => 'mysql',
            'local_shipping_cost' => 0,
            'outer_shipping_cost' => 0,
            'free_shipping_cost' => 0,
            'translatable' => [
                'store_name' => 'Iyad Store',
                'free_shipping_lable' => 'Free Shipping',
                'local_lable' => 'Local Shipping',
                'outer_lable' => 'Outer Shipping'
            ]

        ]);
    }
}
