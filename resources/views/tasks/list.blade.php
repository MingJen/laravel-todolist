@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Todo List</div>

                <form action="/addTask">

                    <input type="text" name="title">
                    <button type="submit">Submit</button>
                </form>

                <div class="panel-body">
                    @foreach ($tasks as $task)
                        {{ $task->title }}-{{ $task->owner->name }}

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
