@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="tag-form__title text-center">Editar Etiqueta</h1>

    <form action="{{ route('tags.update', $tag->id) }}" method="POST" class="tag-form__form">
        @csrf
        @method('PUT')

        <div class="tag-form__group">
            <label class="form-label tag-form__label">Nombre etiqueta: </label>
            <input type="text" name="name" class="form-control tag-form__input" value="{{ $tag->name }}" required>
            <br>
            <label class="form-label tag-form__label">Descripción etiqueta: </label>
            <textarea name="description" class="form-control tag-form__textarea" rows="3">{{ $tag->description }}</textarea>
            <br>
            <label class="form-label tag-form__label">Color</label>
            <input type="color" name="color" class="form-control tag-form__color" value="{{ $tag->color }}">
        </div>
        <br>
        <div class="tag-form__actions">
            <button type="submit" class="btn btn-warning tag-form__btn"> Actualizar </button>
            <a href="{{ route('tags.index') }}" class="btn btn-danger tag-form__btn">Cancelar</a>
        </div>    
    </form>
</div>
@endsection