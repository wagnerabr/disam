<?php

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            'subtitle' => 'Banner 1',
            'image' => 'banner1.jpg',
            'active' => 1
        ]);
    }
}
