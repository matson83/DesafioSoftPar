@extends('layouts.app')

@section('content')
    <h2>Lista de Tarefas</h2>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Status</th>
                <th>Descrição</th>
                <th>Classificação</th>
                <th>Horas Previstas</th>
                <th>Horas Gastas</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->classification }}</td>
                    <td>{{ $task->estimated_hours }}</td>
                    <td>{{ $task->horas_gastas }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}">Editar</a> |
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
