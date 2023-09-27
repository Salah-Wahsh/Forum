<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     */
    public function test_a_user_can_browse_threads(): void
    {
        $thread = \App\Models\Thread::factory()->create();
        $response = $this->get('/threads');
        // $response->assertStatus(200);
        $response->assertSee($thread->title);

    }

    /** test*/
    public function test_a_user_can_see_a_thread(): void
    {
        $thread = \App\Models\Thread::factory()->create();
        $response = $this->get('/threads/' . $thread->id);
        $response->assertSee($thread->title);
    }

    /** test*/
    public function test_a_user_can_read_replies_that_are_associated_with_thread(): void
    {
        $reply = \App\Models\Reply::factory()->create();
        $this->get('/threads/' . $reply->id)->assertSee($reply->body);
    }
}
