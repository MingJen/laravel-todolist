<?php

namespace App\Http\Controllers;

use App\TodoItem;
use App\User;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function showTasks()
    {
        $tasks = TodoItem::all();

        return view('tasks.list', compact('tasks'));
    }

    public function addTask(Request $request)
    {

        $request->user()->addTask($request->title);

        return redirect()->back();

    }
}
