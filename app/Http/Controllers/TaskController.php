<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->latest('updated_at')->paginate(5);
        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:120',
            'text' => 'required'
        ]);

        $task = new Task([
        'user_id' => Auth::id(),
        'title' => $request->title,
        'text' => $request->text,
        'deadline' => $request->deadline
    ]);
    $task->save();

    return to_route('tasks.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show')->with('tasks', $task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:120',
            'text' => 'required',
            'deadline' => 'required'
        ]);

        $task->update([
            'title' => $request->title,
            'text' => $request->text,
            'deadline' => $request->deadline
        ]);

        return to_route('tasks.show', $task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return to_route('tasks.index');
    }
}
