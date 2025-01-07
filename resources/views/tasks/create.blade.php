@extends('layouts.app')

@section('content')
<h2>Criar Tarefa</h2>
<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <label for="title">Título:</label>
    <input type="text" name="title" required>

    <label for="status">Situação:</label>
    <select name="status">
        <option value="Concluída">Concluída</option>
        <option value="Em andamento">Em andamento</option>
        <option value="Espera">Espera</option>
    </select>

    <label for="description">Descrição:</label>
    <textarea name="description" required></textarea>

    <label for="classification">Classificação:</label>
    <select name="classification">
        <option value="Feat">Feat</option>
        <option value="Bug">Bug</option>
    </select>

    <label for="estimated_hours">Horas Previstas:</label>
    <input type="number" name="estimated_hours" required>

    <label for="horas_gastas">Horas Gastas:</label>
    <input type="number" name="horas_gastas">

    <label for="user_id">Atribuir para o Usuário:</label>
    <select name="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>

    <button type="submit">Criar Tarefa</button>
</form>
@endsection
