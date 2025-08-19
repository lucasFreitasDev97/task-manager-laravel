<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if(isset($task))
                {{ __("Editar tarefa: $task->title") }}
            @else
                {{ __('Criar nova tarefa') }}
            @endif
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}" class="space-y-6">
                        @csrf
                        @if(isset($task))
                            @method('PUT')
                        @endif
                        <div>
                            <x-input-label for="title" :value="__('Título')" />
                            <x-text-input
                                id="title"
                                name="title"
                                type="text"
                                class="mt-1 block w-full"
                                :value="old('title', $task?->title)"
                                required
                                autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Descrição')" />
                            <textarea
                                id="description"
                                name="description"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"
                                rows="4"
                            >{{ old('description', $task?->description) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div>
                            <x-input-label for="deadline" :value="__('Prazo Final')" />
                            <x-text-input
                                id="deadline"
                                name="deadline"
                                type="date"
                                class="mt-1 block w-full"
                                :value="old('deadline', isset($task->deadline) ? $task->deadline->format('Y-m-d') : '')"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('deadline')" />
                        </div>

                        @if(isset($task))
                            <div>
                                <x-input-label for="status" :value="__('Status')" />
                                <select
                                    id="status"
                                    name="status"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"
                                    required>
                                    <option value="not_started" @if(old('status', $task->status) == 'not_started') selected @endif>
                                        Não Iniciada
                                    </option>
                                    <option value="ongoing" @if(old('status', $task->status) == 'ongoing') selected @endif>
                                        Em Andamento
                                    </option>
                                    <option value="completed" @if(old('status', $task->status) == 'completed') selected @endif>
                                        Completa
                                    </option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('status')" />
                            </div>
                        @endif

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ isset($task) ? __('Salvar Alterações') : __('Criar Tarefa') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
