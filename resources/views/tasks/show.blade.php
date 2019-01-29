@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

        <div class="container">

                <!-- Task Name -->
                <div class="form-group">
                    <h4 style="padding-bottom: 2%" for="task" class="col-sm-3 control-label">Show Task</h4>

                    <div class="col-sm-6">
                        <label>Name</label>
                        <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}" readonly="readonly">
                    </div>
                    <div class="col-sm-6">
                        <label>PIC</label>
                        <input type="text" name="person" id="task-person" class="form-control"  value="{{ $task->person }}" readonly="readonly">
                    </div>
                    <div class="col-sm-6">
                        <br>
                        <a href="{{ url('tasks/'.$task->id.'/edit') }}" class="btn btn-block btn-info">Edit</a>
                    </div>
                </div>

        </div>
    </div>

    <!-- TODO: Current Tasks -->
@endsection
