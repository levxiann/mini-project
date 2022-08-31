<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_basic_routing()
    {
        $this->get('/home')
            ->assertStatus(200)
            ->assertSeeText('Welcome');
    }

    public function test_redirect()
    {
        $this->get('/about')
            ->assertRedirect('/home');
    }

    public function test_fallback()
    {
        $this->get('/404')
            ->assertSeeText('404');
    }

    public function test_route_parameter()
    {
        $this->get('/products/1')
            ->assertSeeText('Produk ID : 1');

        $this->get('/products/1/items/buku')
            ->assertSeeText('Produk ID : 1 Item : buku');
    }

    public function test_route_parameter_regex()
    {
        $this->get('/categories/100')
            ->assertSeeText('Category ID : 100');

        $this->get('/categories/hello')
            ->assertSeeText('404');
    }

    public function test_route_optional_parameter()
    {
        $this->get('/users/1')
            ->assertSeeText('User ID : 1');

        $this->get('/users/')
            ->assertSeeText('User ID : 404');
    }

    public function test_named_route()
    {
        $this->get('/produk/1')
            ->assertSeeText('Link : http://localhost/products/1');

        $this->get('/produk_redirect/1')
            ->assertSeeText('products/1');
    }
}
