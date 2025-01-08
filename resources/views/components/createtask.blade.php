@extends('layouts.app')

@section('content')
<div class="container px-2 mt-5">
    <form method="POST" action="{{ route('tasks.store') }}" class="mb-2">
        @csrf

        <!-- Título -->
        <div class="mb-3">
            <label for="title" class="form-label">Título:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <!-- Situação -->
        <div class="mb-3">
            <label for="status" class="form-label">Situação:</label>
            <select name="status" class="form-select">
                <option value="Concluída">Concluída</option>
                <option value="Em andamento">Em andamento</option>
                <option value="Espera">Espera</option>
            </select>
        </div>

        <!-- Descrição -->
        <div class="mb-3">
            <label for="description" class="form-label">Descrição:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <!-- Classificação -->
        <div class="mb-3">
            <label for="classification" class="form-label">Classificação:</label>
            <select name="classification" class="form-select">
                <option value="Feat">Feat</option>
                <option value="Bug">Bug</option>
            </select>
        </div>

        <!-- Horas Previstas -->
        <div class="mb-3">
            <label for="estimated_hours" class="form-label">Horas Previstas:</label>
            <input type="number" name="estimated_hours" class="form-control" required>
        </div>

        <!-- Horas Gastas -->
        <div class="mb-3">
            <label for="horas_gastas" class="form-label">Horas Gastas:</label>
            <input type="number" name="horas_gastas" class="form-control">
        </div>

        <!-- Atribuir a Usuário -->
        <div class="mb-3">
            <label for="user_id" class="form-label">Atribuir para o Usuário:</label>
            <select name="user_id" class="form-select">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Botões -->
        <div class=" d-flex justify-content-end">
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary me-2">Cancelar</a>
            <button type="submit" class="btn btn-primary">Criar Tarefa</button>
        </div>
    </form>
</div>
@endsection
