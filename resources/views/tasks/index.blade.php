@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    {{-- <div class="panel-body"> --}}

        <div class="container-fluid">
            <div class="row">
               <div class="offset-1 col-10">
                    @auth
                    <div style="padding-bottom: 5%">
                        <h5>
                            <a href="{{ url('tasks/create') }}" class="btn btn-primary float-right">New Task</a>
                        </h5>
                    </div>
                @endauth
                <!-- Display Validation Errors -->
                @include('common.errors')
                @include('common.success')

                <div class="table table-striped css-serial">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Task</th>
                            <th>PIC</th>
                            <th>Action</th>
                        </thead>
                        @forelse($tasks as $task)
                        <tr>
                            <td></td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->person }}</td>
                            @guest
                            <td><a href="{{ url('login') }}">Login needed for further actions</a></td>
                            @endguest
                            @auth
                            <td>
                                <a href="{{ url('tasks/'.$task->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ url('tasks/'.$task->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal_{{ $task->id }}">Delete</a>
                            </td>
                            @endauth
                        </tr>
                        @empty
                        No data!
                        @endforelse
                    </table>
                </div>
                    @foreach($tasks as $task)
                        <!-- The Modal -->
                        <div class="modal" id="deleteModal_{{ $task->id }}">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header modal-header-danger">
                                <h5 class="modal-title">Confirm delete task {{ $task->name }}?</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div class="modal-body">
                                <form action="{{ url('tasks/'.$task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-trash">Yes</i>
                                    </button>
                                    <button type="submit" class="btn btn-danger" data-dismiss="modal">
                                        <i class="fa fa-trash">Cancel</i>
                                    </button>
                                </form>
                              </div>

                            </div>
                          </div>
                        </div>
                    @endforeach
               </div>
            </div>

        </div>
    {{-- </div> --}}

    <!-- TODO: Current Tasks -->
@endsection
