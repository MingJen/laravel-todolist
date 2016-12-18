@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Todo List</div>


                <div class="panel-body">
                    <form  class="form-group form-inline" action="/addTask" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control" type="text" name="title">
                            <button class="btn btn-primary" type="submit">New Task</button>
                        </div>
                    </form>
                    @foreach ($tasks as $task)
                        <div class="form-group">
                            <form class="form-inline" action="/modifyTask/{{ $task->id }}" method="POST">
                                {{ csrf_field() }}
                                <input class="form-control" type="text" name="modify_title" value="{{ $task->title }}">
                                @if($task->is_finish)
                                    <label>Finished</label>
                                @else
                                    <a class="btn btn-success" href="/finishTask/{{ $task->id }}">Finish</a>
                                @endif
                                <button class="btn btn-info" type="submit">Modify</button>
                                <a href="/deleteTask/{{ $task->id }}" class="btn btn-danger">Delete</a>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
