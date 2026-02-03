@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/todo-project/task_style.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container task">
    <h1 class="task__title">Lista de Tareas</h1>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">
                Agregar nueva tarea </a>

    @if($tasks->isEmpty())
        <p class="task__empty">No hay tareas disponibles.</p>
    @else

        <section class="task__list">
            <ul class="task__items">
                @foreach ($tasks as $task)
                    <li class="task__item {{ $task->status ? 'task__item--completed' : '' }}">
                        <form action="{{ route('tasks.status', $task->id) }}" method="POST">  
                            @csrf
                            @method('PATCH')

                            <input class="task__checkbox" type="checkbox" onchange="this.form.submit()"
                                {{ $task->status ? 'checked' : '' }}
                            />
                        </form>

                        <div class="task__content">
                            <h4 class="task__item-title">{{ $task->title }}</h4>
                            <p class="task__description">{{ $task->description }}</p>

                            <small class="task__category" style="color: {{ $task->category->color ?? '#000' }}">
                                {{ $task->category->name }}
                            </small>

                            @if ($task->tags->isNotEmpty())
                                <div class="task__tags">
                                    @foreach ($task->tags as $tag)
                                        <span class="task__tag" style="background-color: {{ $tag->color }}80;">
                                            {{ $tag->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <span class="task__tag task__tag--empty">
                                    No hay etiquetas asignadas
                                </span>
                            @endif
                        </div>

                        <div class="task__actions"> 
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">
                                Ver
                            </a> 
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm tasks__btn">
                                Editar
                            </a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que desea eliminar la tarea?')">
                                    Eliminar
                                </button>
                            </form>
                        </div>

                    </li>
                @endforeach
            </ul>
        </section>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6'
                });
            </script>
        @endif
    @endif
</div>
@endsection
