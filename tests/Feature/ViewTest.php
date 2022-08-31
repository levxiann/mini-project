<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_view()
    {
        $this->get('/index')
            ->assertSeeText('Hello Levina Gunawan !!!');
    }

    public function test_view_without_route()
    {
        $this->get('index', ['name' => 'Levina Gunawan'])
            ->assertSeeText('Hello Levina Gunawan !!!');
    }
}
