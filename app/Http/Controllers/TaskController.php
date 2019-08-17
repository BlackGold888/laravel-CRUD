<?php

namespace App\Http\Controllers;

use App\Http\Requests\createTaskRequest;
use App\Task;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class TaskController extends Controller
{
    use ValidatesRequests;

    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();//desc новые в начале asc новые в конец или latest()->get() новые в начале
        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(createTaskRequest $request)
    {

        if ($request->has('logo')) {
            $logoName = time() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('logos'), $logoName);

        }

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'logo' => isset($logoName) ? asset('logos/' . $logoName) : '',

        ]);
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(createTaskRequest $request, $id)
    {

        if ($request->logo) {
            $logoName = time() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('logos'), $logoName);
        }
        Task::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'logo' => isset($logoName) ? asset('logos/' . $logoName) : Task::find($id)->logo,

        ]);


        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        Task::find($id)->delete();
        return redirect()->route('tasks.index');
    }
}
