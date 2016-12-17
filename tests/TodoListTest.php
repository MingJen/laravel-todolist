<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TodoListTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_create_own_todo_list()
    {
        $user = factory(App\User::class)->create();

        $do_something = 'do something';

        $user->addTodo($do_something);

        $this->seeInDatabase('todo_items', [
            'user_id' => $user->id,
            'title'   => $do_something,
        ]);
    }
}
