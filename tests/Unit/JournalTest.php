<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Notebook;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JournalTest extends TestCase
{
    use DatabaseMigrations;

    // Create 1 Journal
    /** @test */
    public function createNewJournal(){
        $user = factory(User::class)->create();
        $user->notebooks()->save(factory(Notebook::class)->make());

        $this->assertEquals(1, $user->notebooks->count());
    }

    // Creat 10 users and 1 journal foreach User
    /** @test */
    public function createNewMultipleJournal(){
        $users = factory(User::class,10)->create();
        $count = 0;

        $users->each(function($user){
            $notebooks = $user->notebooks();
            $notebooks->save(factory(Notebook::class)->make());
        });

        foreach($users as $user){
            $notebooks = $user->notebooks();
            $count += $notebooks->count();
        }

        $this->assertEquals(10, $count);
    }
}
