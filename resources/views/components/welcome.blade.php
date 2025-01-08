@extends('layouts.app')

@section('content')
<div class="container px-2 mt-5">
    <div class="table-responsive">
        <table class="table table-responsive table-borderless">
            <thead class="bg-light">
                <tr>
                    <th scope="col">Título:</th>
                    <th scope="col">Status:</th>
                    <th scope="col">Descrição:</th>
                    <th scope="col">Classificação:</th>
                    <th scope="col">Horas Previstas:</th>
                    <th scope="col">Horas Gastas:</th>
                    <th scope="col">Atribuído à:</th>
                    <th scope="col">Ações:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    @php
                        $statusClass = '';
                        switch ($task->status) {
                            case 'Concluída':
                                $statusClass = 'table-success';
                                break;
                            case 'Em andamento':
                                $statusClass = 'table-warning';
                                break;
                            case 'Espera':
                                $statusClass = 'table-danger';
                                break;
                        }
                    @endphp
                    <tr class="{{ $statusClass }}">
                        <td class="text-truncate" style="max-width: 150px;">{{ $task->title }}</td>
                        <td>{{ $task->status }}</td>
                        <td class="text-truncate" style="max-width: 150px;">{{ $task->description }}</td>
                        <td style="max-width: 200px;">{{ $task->classification }}</td>
                        <td style="max-width: 200px;">{{ $task->estimated_hours }}</td>
                        <td style="max-width: 200px;">{{ $task->horas_gastas }}</td>
                        <td class="text-truncate" style="max-width: 200px;">{{ $task->user->name ?? 'Não atribuído' }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i> Editar
                            </a>

                            @if(Auth::user()->usertype == 'admin')
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Excluir
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('styles')
<style>
    .table td, .table th {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Definindo as cores específicas para cada situação */
    .table-success {
        background-color: #d4edda !important;
    }
    .table-warning {
        background-color: #fff3cd !important;
    }
    .table-danger {
        background-color: #f8d7da !important;
    }
</style>
@endsection
