<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = Group::create([
            'name' => 'Grupo A1'
        ]);
        $group->users()->attach([1, 2, 3]);
        Group::create([
            'name' => 'Grupo B1'
        ]);
    }
}
