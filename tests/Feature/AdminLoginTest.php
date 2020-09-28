<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $username = 'hdplz';
        $password = 'hdplz';

        $failResponse = $this->post('admin/login',[
            'username' => $username,
            'password' => $password . 'wrong'
        ]);
        $failResponse->assertSee('Username or password is incorrect!');

        $successResponse = $this->post('admin/login',[
            'username' => $username,
            'password' => $password
        ]);
        $successResponse->assertSee($username);

        $successResponse = $this->followingRedirects()->get('admin/logout');
        $successResponse->assertSee('Login');
    }
}
