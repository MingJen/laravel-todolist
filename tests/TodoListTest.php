<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class TodoListTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_can_create_own_todo_list()
    {
        $user = factory(User::class)->create();

        $do_something = 'do something';

        $user->addTask($do_something);

        Auth::login($user);

        $this->visit('/tasks')
             ->see('do something')
             ->see('-'.$user->name);
    }
}
