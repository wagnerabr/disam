<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BannersTableSeeder::class);
        $this->call(EnvironmentsTableSeeder::class);
    }
}
