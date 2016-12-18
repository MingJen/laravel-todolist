<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class TodoListTest extends TestCase
{
    private $new_task_btn_name = 'New Task';

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
             ->press($this->new_task_btn_name)
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
             ->press($this->new_task_btn_name)
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
             ->press($this->new_task_btn_name)
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
             ->press($this->new_task_btn_name)
             ->see('Delete')
             ->click('Delete')
             ->dontSee('Delete');

    }

    /**
     * @test
     */
    public function it_only_see_own_task()
    {
        $user = factory(User::class)->create();
        $do_something = 'do something';
        Auth::login($user);

        $this->visit('/tasks')
             ->type($do_something, 'title')
             ->press($this->new_task_btn_name);

        $another_user = factory(User::class)->create();
        Auth::login($another_user);

        $this->visit('/tasks')
             ->dontSee($do_something);


    }
}
