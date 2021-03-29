<?php

use Illuminate\Database\Seeder;
use App\Mitra;
class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mitra::create([
            'name' => 'aldni',
            'email' => 'aldini@gmail.com',
            'password' => bcrypt('aldini123')
        ]);
        mitra::create([
            'name' => 'mitra',
            'email' => 'mitra@gmail.com',
            'password' => bcrypt('mitra')
        ]);
    }
}
