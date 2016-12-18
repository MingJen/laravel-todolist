<?php

namespace App\Http\Controllers;

use App\TodoItem;
use App\User;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function showTasks(Request $request)
    {
        $tasks = TodoItem::where('user_id', $request->user()->id)->with('owner')->get();

        return view('tasks.list', compact('tasks'));
    }

    public function addTask(Request $request)
    {

        $request->user()->addTask($request->title);

        return redirect()->back();
    }

    public function modifyTask(Request $request, $id)
    {
        $task = TodoItem::find($id);

        if ($request->user()->id == $task->user_id) {

            $task->title = $request->modify_title;
            $task->save();

        }

        return redirect()->back();
    }

    public function finishTask(Request $request, $id)
    {
        $task = TodoItem::find($id);

        if ($request->user()->id == $task->user_id) {

            $task->is_finish = true;
            $task->save();

        }

        return redirect()->back();
    }

    public function deleteTask(Request $request, $id)
    {
        $task = TodoItem::find($id);

        if ($request->user()->id == $task->user_id) {

            $task->delete();

        }

        return redirect()->back();
    }
}
