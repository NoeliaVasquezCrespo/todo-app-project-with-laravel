@extends('layouts.app')

@section('content')
<div class="container tag-form">
    <h1 class="tag-form__title text-center">Nueva Etiqueta</h1>

    <form action="{{ route('tags.store') }}" method="POST" class="tag-form__form">
        @csrf

        <div class="tag-form__group">
            <label class="form-label tag-form__label">Nombre etiqueta:</label>
            <input type="text" name="name" class="form-control tag-form__input" value="{{ old('name') }}">
            <br>
            <label class="form-label tag-form__label">Descripción etiqueta:</label>
            <textarea name="description" class="form-control tag-form__textarea" rows="3">{{ old('description') }}</textarea>
            <br>
            <label class="form-label tag-form__label mb-0">Color etiqueta:</label>
            <input type="color" name="color" class="form-control tag-form__color"  value="{{ old('color', '#000000') }}" required>
        </div>
        <br>
        <div class="tag-form__actions">
            <button type="submit" class="btn btn-primary tag-form__btn">Guardar</button>
            <a href="{{ route('tags.index') }}" class="btn btn-danger tag-form__btn">Cancelar</a>
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
 