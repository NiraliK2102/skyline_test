<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_create_todo()
    {
        User::factory()->create();

        $response = $this->actingAs($user,'sanctum')->postJson('/api/todos',[
            'title'=>'Test Todo',
            'description'=>'This is Test',
            'status'=>'todo',
        ]);

        $responses->assertStatus(201);
        $this->assertDatabaseHas('to_dos',['title'=>'Test Todo']);
    }
}
