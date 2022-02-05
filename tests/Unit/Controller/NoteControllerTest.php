<?php

namespace Tests\Unit\Controller;

use App\Models\Group;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoteControllerTest extends TestCase
{
    use RefreshDatabase;
    private $uri = 'notes';
    public function test_store()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create(['name' => 'Luis', 'email' => 'Luis@gmail.com', 'password' => bcrypt('123456')]);
        $group = Group::factory()->create(['name' => 'Grupo A1']);

        $json = [
            'title' => 'Notita 01',
            'description' => 'Hola Mundo',
            'group_id' => $group->id,
            'user_id' => $user->id,
        ];
        $this->actingAs($user)->withSession(['banned' => false])->postJson("api/$this->uri", $json)
            ->assertStatus(201)
            ->assertJson(['message' => 'Nota Registrada']);
        $this->assertDatabaseHas("$this->uri", $json);
    }
}
