<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class ApiAuthenticationTest extends TestCase
{
    /**
     * @test
     */
    public function userCanReceiveJwtToken()
    {
        // we need a user that can request the token
        $user = factory(User::class)->create([
            'password' => password_hash("test1234", PASSWORD_BCRYPT)
        ]);

        // issue a token request
        $response = $this->get("/api/auth?email=$user->email&password=test1234");

        // assert that the response contains a token
        $response->assertSee("token");
    }

    /**
     * @test
     */
    public function invalidCredentialsDontYieldAToken()
    {
        // request a token with some random credentials
        $response = $this->get("/api/auth?email=test@test.de&password=test1234");

        // assert that we get a sufficient error and DONT see a token
        $response->assertSee("invalid_credentials");
        $response->assertDontSee("token");
    }

    /**
     * @test
     */
    public function userCanAuthenticateWithToken()
    {
        // make a user
        $user = factory(User::class)->create([
            'password' => password_hash("test1234", PASSWORD_BCRYPT)
        ]);

        // get a token
        $response = $this->get("/api/auth?email=$user->email&password=test1234");
        $data = $response->json();
        $token = $data['token'];

        // try to access the user from this token via API
        $response = $this->get("/api/user?token=$token");
        $response->assertStatus(200);
        $response->assertSee($user->email);
    }

    /**
     * @test
     */
    public function invalidTokenYieldsError()
    {
        // Request the logged-in user with an invalid token
        $response = $this->get("/api/user?token=invalidtoken");

        // we should see "unauthorized" (HTTP status 401)
        $response->assertStatus(401);
    }
}
