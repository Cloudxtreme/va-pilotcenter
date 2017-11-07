<?php

namespace Tests\Feature;

use App\User;
use Auth;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * @test
     */
    public function authorizedRequestsRedirectToHome()
    {
        // make a user
        $user = factory(User::class)->create();

        // set a user
        Auth::setUser($user);

        // request login
        $response = $this->get("/login");

        // expect to see the redirect to /home
        $response->assertRedirect("/home");
    }
}
