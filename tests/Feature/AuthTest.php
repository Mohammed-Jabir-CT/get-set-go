<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('pages.login');
    }

    public function test_user_can_login() {
        $user = User::factory()->create();
        $response = $this->post('/authenticate', ['email'=>$user->email, 'password'=>'password1']);

        $response->assertRedirect();
        $response->assertRedirectToRoute('dashboard');
    }

    
}
