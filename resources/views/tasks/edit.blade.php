@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/todo-project/task_style.css') }}">
@endpush

@section('content')
<div class="container task-form">
    <h1 class="task-form__title text-center">Editar Tarea</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="task-form__form">
        @csrf
        @method('PUT')

        <div class="task-form__group">
            <label class="form-label task-form__label">Título:</label>
            <input type="text" name="title" class="form-control task-form__input" value="{{ old('title', $task->title) }}" required>
            <br>
            <label class="form-label task-form__label">Descripción:</label>
            <textarea name="description" class="form-control task-form__textarea" rows="3">{{ old('description', $task->description) }}</textarea>
            <br>
            <label class="form-label task-form__label">Categoría:</label>
            <select name="category_id" class="form-control task-form__select" required>
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id', $task->category_id) == $category->id ? 'selected' : '' }}>
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
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                {{ collect(old('tags', $task->tags))->contains('id', $tag->id) ? 'checked' : '' }}>
                            <span class="task-form__tag-label" style="background-color: {{ $tag->color }}80; color: {{ $tag->color }};">
                                {{ $tag->name }}
                            </span>
                        </label>
                    @endforeach
                </div>
            </details>
        </div>
        <br>
        <div class="task-form__actions">
            <button type="submit" class="btn btn-primary task-form__btn">
                Actualizar
            </button>
            <a href="{{ route('tasks.index') }}" class="btn btn-danger task-form__btn">
                Cancelar
            </a>
        </div>
    </form>
</div>

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Errores de validación',
            html: `
                @foreach ($errors->all() as $error)
                    - {{ $error }}<br>
                @endforeach
            `,
        });
    </script>
@endif

@endsection
