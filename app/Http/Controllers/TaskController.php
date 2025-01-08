<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        if (Auth::user()->usertype != 'admin') {
            return redirect()->route('tasks.index')->with('error', 'Você não tem permissão para criar tarefas.');
        }

        $users = User::where('usertype', 'user')->get();
        return view('tasks.create', compact('users'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
            'classification' => 'required',
            'estimated_hours' => 'required|integer',
            'horas_gastas' => 'nullable|integer',
            'user_id' => 'required|exists:users,id',
        ]);

        Task::create([
            'title' => $request->title,
            'status' => $request->status,
            'description' => $request->description,
            'classification' => $request->classification,
            'estimated_hours' => $request->estimated_hours,
            'horas_gastas' => $request->horas_gastas,
            'user_id' => $request->user_id,
            'admin_id' => Auth::id(),
        ]);

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        $task->load('user');
        $users = User::all();
        return view('tasks.edit', compact('task', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        // Validação comum para todos os usuários
        $validated = $request->validate([
            'status' => 'required|string',
            'description' => 'required|string',
            'horas_gastas' => 'nullable|integer',
        ]);

        // Verificando se o usuário é admin para permitir edição de mais campos
        if (Auth::user()->usertype == 'admin') {
            // Adicionando as validações para campos que o admin pode editar
            $request->validate([
                'title' => 'required|string|max:255',
                'user_id' => 'required|exists:users,id',
                'estimated_hours' => 'nullable|integer',
            ]);

            // Atualizando o task com todos os campos
            $task->update($request->only(['title', 'user_id', 'estimated_hours', 'status', 'description', 'classification', 'horas_gastas']));
        } else {
            // Atualizando apenas os campos que o usuário pode editar
            $task->update($request->only(['status', 'description', 'horas_gastas']));
        }

        // Redirecionando de volta para a lista de tarefas
        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
