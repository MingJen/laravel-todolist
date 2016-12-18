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

        Auth::login($user);

        $this->visit('/tasks')
             ->type($do_something, 'title')
             ->press('Submit')
             ->see('do something')
             ->see('-'.$user->name);
    }

    /**
     * @test
     */
    public function it_can_modify_task_title()
    {
        $user = factory(User::class)->create();

        $do_something = 'do something';

        $another_thing = 'another thing';

        Auth::login($user);

        $this->visit('/tasks')
             ->type($do_something, 'title')
             ->press('Submit')
             ->type($another_thing, 'modify_title')
             ->press('Modify')
             ->see($another_thing);

    }

    /**
     * @test
     */
    public function it_can_finish_task()
    {
        $user = factory(User::class)->create();

        $do_something = 'do something';

        Auth::login($user);

        $this->visit('/tasks')
             ->type($do_something, 'title')
             ->press('Submit')
             ->see('Finish')
             ->click('Finish')
             ->see('Finished');

    }

    /**
     * @test
     */
    public function it_can_delete_task()
    {
        $user = factory(User::class)->create();

        $do_something = 'do something';

        Auth::login($user);

        $this->visit('/tasks')
             ->type($do_something, 'title')
             ->press('Submit')
             ->see('Delete')
             ->click('Delete')
             ->dontSee('Delete');

    }
}
