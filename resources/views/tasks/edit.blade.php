@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

        <div class="container">

            <!-- Display Validation Errors -->
            @include('common.errors')
            @include('common.success')

            <!-- New Task Form -->
            <form action="{{ url('tasks') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Task Name -->
                <div class="form-group">
                    <h4 style="padding-bottom: 2%" for="task" class="col-sm-3 control-label">Edit Task</h4>

                    <div class="col-sm-6">
                        <label>Name</label>
                        <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
                    </div>
                    <div class="col-sm-6">
                        <label>PIC</label>
                        <input type="text" name="person" id="task-person" class="form-control"  value="{{ $task->person }}">
                    </div>
                </div>

                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Edit Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- TODO: Current Tasks -->
@endsection
