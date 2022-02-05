<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Luis Murrugarra Astolingon',
            'email' => 'luismurrugarra17@gmail.com',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'name' => 'Jose Murrugarra Astolingon',
            'email' => 'admin123@gmail.com',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'name' => 'Genesis Murrugarra Astolingon',
            'email' => 'Genesis@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
