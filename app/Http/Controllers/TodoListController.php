<?php

namespace App\Http\Controllers;

use App\TodoItem;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function showTasks()
    {
        $tasks = TodoItem::all();

        return view('tasks.list', compact('tasks'));
    }
}
