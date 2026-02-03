@extends('layouts.app')

@section('content')

<div class="container task-form">
<link rel="stylesheet" href="{{ asset('css/todo-project/task_style.css') }}">
    <h1 class="task-form__title text-center">Nueva Tarea</h1>

    <form action="{{ route('tasks.store') }}" method="POST" class="task-form__form">
        @csrf

        <div class="task-form__group">
            <label class="form-label task-form__label">Título:</label>
            <input type="text" name="title" class="form-control task-form__input" required>
            <br>
            <label class="form-label task-form__label">Descripción:</label>
            <textarea name="description" class="form-control task-form__textarea" rows="3" required></textarea>
            <br>
            <label class="form-label task-form__label">Categoría:</label>
            <select name="category_id" class="form-control task-form__select" required>
                <option value="">Seleccione una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <br>
            <label class="form-label task-form__label">Etiquetas:</label>
            <details class="task-form__multiselect">
                <summary class="task-form__multiselect-btn">
                    Seleccionar etiquetas
                </summary>

                <div class="task-form__multiselect-dropdown">
                    @foreach ($tags as $tag)
                        <label class="task-form__multiselect-option">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                            <span class="task-form__tag-label" style=" background-color: {{ $tag->color }}80; color: {{ $tag->color }};">
                                {{ $tag->name }}
                            </span>
                        </label>
                    @endforeach
                </div>
            </details>
            <br>
            <div class="task-form__actions">
                <button type="submit" class="btn btn-primary task-form__btn">
                    Guardar
                </button>

                <a href="{{ route('tasks.index') }}" class="btn btn-danger task-form__btn">
                    Cancelar
                </a>
            </div>
    </form>
</div>
@endsection
