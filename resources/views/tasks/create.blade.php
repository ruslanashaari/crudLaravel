@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

        <div class="container">
            @include('common.errors')
            <!-- New Task Form -->
            <form action="{{ url('tasks') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Task Name -->
                <div class="form-group">
                    <h4 for="task" class="col-sm-3 control-label" style="padding-bottom: 2%">New Task</h4>

                    <div class="col-sm-6">
                        <label>Name</label>
                        <input type="text" name="name" id="task-name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="col-sm-6">
                        <label>PIC</label>
                        <input type="text" name="person" id="task-person" class="form-control" value="{{ old('person') }}">
                    </div>
                </div>

                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Add Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- TODO: Current Tasks -->
@endsection
