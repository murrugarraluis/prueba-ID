<?php

namespace Tests\Unit\Controller;

use App\Models\Group;
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
        $group = Group::factory()->create([
            'name' => 'Grupo A1'
        ]);

        $user = User::factory()->create(['name' => 'Luis', 'email' => 'Luis@gmail.com', 'password' => bcrypt('123456')]);
        $json = [
            'id_user' => $user->id,
        ];
        $this->actingAs($user)->withSession(['banned' => false])->postJson("api/$this->uri/$group->id/join", $json)
            ->assertStatus(201)
            ->assertJson(['message' => 'Usuario Registrado en Grupo']);
    }
}
