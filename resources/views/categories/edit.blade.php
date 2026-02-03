@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="category-form__title text-center">Editar Categoría</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="category-form__form">
        @csrf
        @method('PUT')

        <div class="category-form__group">
            <label class="form-label category-form__label">Nombre</label>
            <input type="text" name="name" class="form-control category-form__input" value="{{ $category->name }}" required>
            <br>
            <label class="form-label category-form__label">Descripción</label>
            <textarea name="description" class="form-control category-form__textarea" rows="3">{{ $category->description }}</textarea>
            <br>
            <label class="form-label category-form__label">Color</label>
            <input type="color" name="color" class="form-control category-form__color" value="{{ $category->color }}">
        </div>
        <br>
        <div class="category-form__actions">
            <button type="submit" class="btn btn-warning category-form__btn"> Actualizar </button>
            <a href="{{ route('categories.index') }}" class="btn btn-danger category-form__btn">Cancelar</a>
        </div>    
    </form>
</div>
@endsection
