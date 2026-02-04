@extends('layouts.app')

@section('content')
<div class="container category-form">
    <h1 class="category-form__title text-center">Nueva Categoría</h1>

    <form action="{{ route('categories.store') }}" method="POST" class="category-form__form">
        @csrf

        <div class="category-form__group">
            <label class="form-label category-form__label">Nombre:</label>
            <input type="text" name="name" class="form-control category-form__input" value="{{ old('name') }}" required>
            <br>
            <label class="form-label category-form__label">Descripción:</label>
            <textarea name="description" class="form-control category-form__textarea" rows="3">{{ old('description') }}</textarea>
            <br>
            <label class="form-label category-form__label mb-0">Color:</label>
            <input type="color" name="color" class="form-control category-form__color" value="{{ old('color', '#000000') }}" required>
        </div>
        <br>
        <div class="category-form__actions">
            <button type="submit" class="btn btn-primary category-form__btn">Guardar</button>
            <a href="{{ route('categories.index') }}" class="btn btn-danger category-form__btn">Cancelar</a>
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
 