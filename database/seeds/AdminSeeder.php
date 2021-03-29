<?php

use Illuminate\Database\Seeder;
use App\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        admin::create([
            'name' => 'Nurkom',
            'email' => 'nurkom@gmail.com',
            'password' => bcrypt('nurkom')
        ]);
        admin::create([
            'name' => 'aldini',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);
    }
}
