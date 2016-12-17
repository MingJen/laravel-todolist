@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Todo List</div>

                <form action="/addTask" method="POST">
                    {{ csrf_field() }}
                    <input type="text" name="title">
                    <button type="submit">Submit</button>
                </form>

                <div class="panel-body">

                    @foreach ($tasks as $task)
                        <div>
                            <form action="/modifyTask/{{ $task->id }}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" name="modify_title" value="{{ $task->title }}">-{{ $task->owner->name }}
                                <button class="button" type="submit">Modify</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
