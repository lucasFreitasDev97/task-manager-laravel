<?php

namespace App\Services;

use App\Models\Task;
use App\Models\User;

class TaskService
{
    public function store(array $data, User $user): Task
    {
        return $user->tasks()->create($data);
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
