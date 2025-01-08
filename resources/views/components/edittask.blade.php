@extends('layouts.app')

@section('content')
<div class="container px-2 mt-5">
    <h2 class="mb-4">Editar Tarefa</h2>
    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')

        <!-- Título (Apenas admin) -->
        @if(auth()->user()->usertype === 'admin')
        <div class="mb-3">
            <label for="title" class="form-label">Título:</label>
            <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Atribuir ao Usuário:</label>
            <select name="user_id" class="form-select">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="estimated_hours" class="form-label">Horas Previstas:</label>
            <input type="number" name="estimated_hours" class="form-control" value="{{ $task->estimated_hours }}">
        </div>
    @endif

        <!-- Situação -->
        <div class="mb-3">
            <label for="status" class="form-label">Situação:</label>
            <select name="status" class="form-select">
                <option value="Concluída" {{ $task->status == 'Concluída' ? 'selected' : '' }}>Concluída</option>
                <option value="Em andamento" {{ $task->status == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                <option value="Espera" {{ $task->status == 'Espera' ? 'selected' : '' }}>Espera</option>
            </select>
        </div>

        <!-- Descrição -->
        <div class="mb-3">
            <label for="description" class="form-label">Descrição:</label>
            <textarea name="description" class="form-control">{{ $task->description }}</textarea>
        </div>

        <!-- Classificação -->
        <div class="mb-3">
            <label for="classification" class="form-label">Classificação:</label>
            <select name="classification" class="form-select">
                <option value="Feat" {{ $task->classification == 'Feat' ? 'selected' : '' }}>Feat</option>
                <option value="Bug" {{ $task->classification == 'Bug' ? 'selected' : '' }}>Bug</option>
            </select>
        </div>


        <!-- Horas Gastas -->
        <div class="mb-3">
            <label for="horas_gastas" class="form-label">Horas Gastas:</label>
            <input type="number" name="horas_gastas" class="form-control" value="{{ $task->horas_gastas }}">
        </div>

        <!-- Botões -->
        <div class="d-flex justify-content-end">
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary me-2">Cancelar</a>
            <button type="submit" class="btn btn-primary">Atualizar Tarefa</button>
        </div>
    </form>
</div>
@endsection
