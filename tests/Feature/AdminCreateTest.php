<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminCreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function create_admin()
    {
        $response = $this->post('/admin');
        $this->assertArrayHasKey('admis', ['username' => 'xxxx']);

    }
}
