<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\TaskService;
use Illuminate\View\View;

class TaskController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService){
        $this->taskService = $taskService;
    }

    public function index(Request $request): View
    {
        $tasks = Task::all();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function form(Task $task = null): View
    {
        return view('tasks.form', ['task' => $task]);
    }

    public function store(TaskRequest $taskRequest): RedirectResponse
    {
        $data = $taskRequest->validated();
        $this->taskService->store($data);

        return redirect()->route('task.index');
    }

    public function update(Task $task, TaskRequest $taskRequest): RedirectResponse
    {
        $data = $taskRequest->validated();
        $this->taskService->update($task, $data);

        return redirect()->route('task.index');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $this->taskService->destroy($task);
        return redirect()->route('task.index');
    }
}
