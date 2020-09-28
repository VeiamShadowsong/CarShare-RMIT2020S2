<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserRegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $email = 'zzz@zzz.com';
        $password = 'zzz';

        $failResponse = $this->post('register',[
            'email' => $email,
            'first_name' => $password,
            'last_name' => $password,
            'password' => $password,
            'confirm-password' => $password
        ]);
        $failResponse->assertSee($email);
    }
}
