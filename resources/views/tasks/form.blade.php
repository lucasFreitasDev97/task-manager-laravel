<!-- resources/views/tasks/form.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">
            {{ $task ? 'Editar Tarefa' : 'Nova Tarefa' }}
        </h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ $task ? route('task.update', $task) : route('task.store') }}" method="POST">
            @csrf
            @if($task)
                @method('PUT')
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1" for="title">Título</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $task->title ?? '') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1" for="description">Descrição</label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('description', $task->description ?? '') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1" for="status">Status</label>
                <select
                    id="status"
                    name="status"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                    @php
                        $statuses = ['not_started' => 'Não iniciada', 'in_progress' => 'Em progresso', 'completed' => 'Concluída'];
                    @endphp
                    @foreach($statuses as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $task->status ?? '') === $key ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <button
                    type="submit"
                    class="bg-blue-500 text-white font-medium px-4 py-2 rounded hover:bg-blue-600"
                >
                    {{ $task ? 'Atualizar' : 'Criar' }}
                </button>
            </div>
        </form>
    </div>
@endsection

