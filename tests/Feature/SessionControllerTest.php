<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_session()
    {
        $this->get('/session/create')
            ->assertSeeText('OK')
            ->assertSessionHas('userId', 1)
            ->assertSessionHas('name', 'Levina');
    }

    public function test_get_session()
    {
        $this->withSession([
            'userId' => 1,
            'name' => 'Levina'
        ])->get('/session/get')
            ->assertSeeText('User ID : 1 Name : Levina');
    }

    public function test_get_session_failed()
    {
        $this->withSession([])->get('/session/get')
                                ->assertSeeText('User ID : guest Name : guestName');
    }
}
