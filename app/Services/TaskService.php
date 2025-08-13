<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function store(array $data): Task
    {
        $task = new Task();
        $task->fill($data);
        $task->save();

        return $task;
    }

    public function update( Task $task, array $data): Task
    {
        $task->fill($data);
        $task->update();

        return $task;
    }

    public function destroy(Task $task):void
    {
        $task->delete();
    }
}
