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
            // Se não for admin, redireciona para a página principal (dashboard)
            return redirect()->route('dashboard');
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
        $this->authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $request->validate([
            'status' => 'required',
            'description' => 'required',
            'classification' => 'required',
            'horas_gastas' => 'nullable|integer',
        ]);

        $task->update($request->only(['status', 'description', 'classification', 'horas_gastas']));

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
