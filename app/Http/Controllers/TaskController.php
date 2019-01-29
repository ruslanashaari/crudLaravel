<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = \Validator::make($request->all(), [
            'name'   => 'required|max:255',
            'person' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('tasks/create')
                ->withInput()
                ->withErrors($validator);
        }

        Task::create([
            'name'   => $request->name,
            'person' => $request->person,
        ]);

        return redirect('tasks')->withSuccess('Task successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $task = Task::where('id', $id)->first();

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $task = Task::where('id', $id)->first();

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'name'   => 'required|max:255',
            'person' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('tasks/' . $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }
        //
        $task = Task::where('id', $id)->first();
        $task->update([
            'name'   => $request->name,
            'person' => $request->person,
        ]);

        return redirect('tasks')->withSuccess('Task successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = Task::where('id', $id)->delete();

        return redirect('tasks')->withSuccess('Task successfully deleted!');
    }
}
