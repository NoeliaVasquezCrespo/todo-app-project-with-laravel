@extends('layouts.app')

@section('content')

<div class="container tag-form">

    <h1 class="tag-form__title text-center">Nueva Etiqueta</h1>

    <form action="{{ route('tags.store') }}" method="POST" class="tag-form__form">
        @csrf

        <div class="tag-form__group">
            <label class="form-label tag-form__label">Nombre etiqueta:</label>
            <input type="text" name="name" class="form-control tag-form__input" required>
            <br>
            <label class="form-label tag-form__label">Descripción etiqueta:</label>
            <textarea name="description" class="form-control tag-form__textarea" rows="3"></textarea>
            <br>
            <label class="form-label tag-form__label mb-0">Color etiqueta:</label>
            <input type="color" name="color" class="form-control tag-form__color">
        </div>
        <br>
        <div class="tag-form__actions">
            <button type="submit" class="btn btn-primary tag-form__btn">Guardar</button>
            <a href="{{ route('tags.index') }}" class="btn btn-danger tag-form__btn">Cancelar</a>
        </div>

    </form>
</div>
@endsection
 