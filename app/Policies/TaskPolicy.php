<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function update(User $user, Task $task)
    {
        if ($user->usertype === 'admin') {
            return true;
        }

        // Usuário só pode editar horas_gastas em sua própria tarefa
        return $user->id === $task->user_id;
    }
}
