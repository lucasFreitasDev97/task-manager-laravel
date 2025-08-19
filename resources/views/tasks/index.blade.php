<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tarefas') }}
        </h2>
    </x-slot>
    <div class="py-12 justify-self-center">
        <div class="max-w-7xl mx-auto sm:px-6 space-y-6">
            <div class="flex mb-4">

                <a href="{{route('tasks.form')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Adicionar Nova Tarefa
                </a>
            </div>
            <div class="flex justify-center items-center">
                <div class="overflow-x-auto w-full max-w-5xl">
                    <table class="min-w-full table-fixed divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="w-2/6 px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Título</th>
                            <th class="w-2/6 px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Prazo Final</th>
                            <th class="w-1/6 px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                            <th class="w-1/6 px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Ações</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($tasks as $task)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100">{{$task->title}}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300 text-center">{{$task->deadline->format('d/m/Y')}}</td>
                                <td class="px-6 py-4 text-sm text-center
                                @if($task->status->label() == 'Não iniciado')
                                    text-red-600
                                @endif
                                @if($task->status->label() == 'Concluído')
                                    text-green-600
                                @endif
                                 @if($task->status->label() == 'Em andamento')
                                    text-blue-500
                                @endif
                                ">
                                    {{$task->status->label()}}
                                </td>
                                <td class="px-6 py-4 text-sm text-center space-x-2">
                                    <a href="{{ route('tasks.form', ['task' => $task->getKey()]) }}"
                                       class="text-indigo-600 hover:text-indigo-900 dark:hover:text-indigo-400">
                                        Editar
                                    </a>
                                    <form action="{{ route('tasks.destroy', ['task' => $task->getKey()]) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 dark:hover:text-red-400">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
