@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/todo-project/task_style.css') }}">
@endpush

@section('content')
<div class="container task-detail">
    <h1 class="task-detail__title">Detalle de la Tarea</h1>

    <div class="task-detail__card card mt-3">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $task->id }}</p>
            <p><strong>Título de la tarea:</strong> {{ $task->title }}</p>
            <p><strong>Descripción:</strong> {{ $task->description ?? 'Sin descripción' }}</p>
            <span>
                <p>
                    <strong>Categoría:</strong>
                    <span style="color: {{ $task->category->color }}">
                        {{ $task->category->name }}
                    </span>
                </p>
            </span>
            <p>
                <strong>Estado:</strong>
                <span class="task__status">
                    {{ $task->status ? 'Completada' : 'Pendiente' }}
                </span>
            </p>

            @foreach ($task->tags as $tag)
                <span class="task__tag" style=" background-color: {{ $tag->color }}80; color: {{ $tag->color }};">
                        {{ $tag->name }}
                </span>
            @endforeach

            <br><br>
            <a href="{{ route('tasks.index') }}" class="btn btn-info task-detail__btn">
                Volver
            </a>
        </div>
    </div>
</div>
@endsection