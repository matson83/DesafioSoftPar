@extends('layouts.app')

@section('content')
<h2>Editar Tarefa</h2>
<form method="POST" action="{{ route('tasks.update', $task->id) }}">
    @csrf
    @method('PUT')

    <label for="status">Situação:</label>
    <select name="status">
        <option value="Concluída" {{ $task->status == 'Concluída' ? 'selected' : '' }}>Concluída</option>
        <option value="Em andamento" {{ $task->status == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
        <option value="Espera" {{ $task->status == 'Espera' ? 'selected' : '' }}>Espera</option>
    </select>

    <label for="description">Descrição:</label>
    <textarea name="description">{{ $task->description }}</textarea>

    <label for="classification">Classificação:</label>
    <select name="classification">
        <option value="Feat" {{ $task->classification == 'Feat' ? 'selected' : '' }}>Feat</option>
        <option value="Bug" {{ $task->classification == 'Bug' ? 'selected' : '' }}>Bug</option>
    </select>

    <label for="horas_gastas">Horas Gastas:</label>
    <input type="number" name="horas_gastas" value="{{ $task->horas_gastas }}">

    <button type="submit">Atualizar Tarefa</button>
</form>
@endsection
