<?php

use Illuminate\Database\Seeder;
use App\Konsumen;
class KonsumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        konsumen::create([
            'name' => 'Yoga Rizki Pratama',
            'email' => 'yoga@gmail.com',
            'password' => bcrypt('yoga'),
            'alamat' => 'Jl.lohbener',
            'tanggal_lahir' => '1999-08-17',
            'noHp' => '0899654321'
        ]);
        konsumen::create([
            'name' => 'arief',
            'email' => 'arief@gmail.com',
            'password' => bcrypt('arief'),
            'alamat' => 'Jl.Cirebon',
            'tanggal_lahir' => '2000-08-17',
            'noHp' => '0899654321'
        ]);
    }
}
