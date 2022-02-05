<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Note::create([
            'title' => 'Mi Nota Preferida',
            'description' => 'esta es mi primera nota en el Grupo A1',
            'group_id' => 1,
            'user_id' => 1,
        ]);
        Note::create([
            'title' => 'La Nota Importante',
            'description' => 'esta es mi segunda nota en el Grupo A1',
            'group_id' => 1,
            'user_id' => 1,
        ]);

        Note::create([
            'title' => 'La Nota Bonita',
            'description' => 'esta es mi primera nota en el Grupo B1',
            'group_id' => 2,
            'user_id' => 1,
        ]);
        Note::create([
            'title' => 'Mi Nota',
            'description' => 'esta es mi segunda nota en el Grupo B1',
            'group_id' => 2,
            'user_id' => 1,
        ]);
    }
}
