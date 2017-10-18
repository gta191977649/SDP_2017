<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function newUser()
    {


        $users = factory(User::class, 10)->create();

        $this->assertEquals(10, User::count());

    }
}
