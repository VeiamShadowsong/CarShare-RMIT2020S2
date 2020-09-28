<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $email = 'aaa@aaa.com';
        $password = 'aaa';

        $failResponse = $this->post('login',[
            'email' => $email,
            'password' => $password . 'wrong'
        ]);
        $failResponse->assertSee('Username or password is incorrect!');

        $successResponse = $this->post('login',[
            'email' => $email,
            'password' => $password
        ]);
        $successResponse->assertSee($email);

    }
}
