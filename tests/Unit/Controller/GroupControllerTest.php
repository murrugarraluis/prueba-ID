<?php

namespace Tests\Unit\Controller;

use App\Models\Group;
use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GroupControllerTest extends TestCase
{
    use RefreshDatabase;
    private $uri = 'groups';
    public function test_join_group()
    {
        $this->withExceptionHandling();
        $user = User::factory()->create(['name' => 'Luis', 'email' => 'Luis@gmail.com', 'password' => bcrypt('123456')]);

        $group = Group::factory()->create(['name' => 'Grupo A1']);
        $json = ['id_user' => $user->id];

        $this->actingAs($user)->withSession(['banned' => false])->postJson("api/$this->uri/$group->id/join", $json)
            ->assertStatus(201)
            ->assertJson(['message' => 'Usuario Registrado en Grupo']);
    }
    public function test_list_notes()
    {
        $this->withExceptionHandling();
        $user = User::factory()->create(['name' => 'Luis', 'email' => 'Luis@gmail.com', 'password' => bcrypt('123456')]);

        $group = Group::factory()->create(['name' => 'Grupo A1']);
        $note = Note::factory()->create([
            'title' => 'Mi Nota Preferida',
            'description' => 'esta es mi primera nota en el Grupo A1',
        ]);
        $note->group()->associate($group->id)->save();
        $note->user()->associate($user->id)->save();


        $this->actingAs($user)->withSession(['banned' => false])->getJson("api/$this->uri/$group->id/notes")
            ->assertStatus(200)
            ->assertJson(['data' => []]);
    }
}
