@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Minhas Tarefas</h1>
            <a href="{{ route('tasks.form') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Nova Tarefa</a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($tasks->isEmpty())
            <p class="text-gray-600">Nenhuma tarefa encontrada.</p>
        @else
            <table class="w-full border border-gray-200 rounded">
                <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-2 border-b">Título</th>
                    <th class="text-left px-4 py-2 border-b">Status</th>
                    <th class="px-4 py-2 border-b">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $task->title }}</td>
                        <td class="px-4 py-2 border-b">
                            @php
                                $statuses = [
                                    'not_started' => 'Não iniciada',
                                    'in_progress' => 'Em progresso',
                                    'completed' => 'Concluída'
                                ];
                            @endphp
                            {{ $statuses[$task->status] }}
                        </td>
                        <td class="px-4 py-2 border-b text-center">
                            <a href="{{ route('task.edit', $task) }}" class="text-blue-500 hover:underline mr-2">Editar</a>
                            <form action="{{ route('task.destroy', $task) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Deseja realmente excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

