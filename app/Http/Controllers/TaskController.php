<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\TaskService;


class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return view('tasks.index', compact('tasks'));
    }

    public function show($id)
    {
        $task = $this->taskService->getTask($id);
        return view('tasks.show', compact('task'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'boolean'
        ]);
        $this->taskService->createTask($data);
        return redirect()->route('tasks.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'boolean'
        ]);
        $this->taskService->updateTask($id, $data);
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $this->taskService->deleteTask($id);
        return redirect()->route('tasks.index');
    }
}
