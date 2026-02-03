@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/todo-project/category_style.css') }}">

<div class="container category-detali">
    <h1 class="category-detail__title">Detalle de Categoría</h1>

    <div class="category-detail__card card mt-3">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $category->id }}</p>
            <p><strong>Nombre:</strong> {{ $category->name }}</p>
            <p><strong>Descripción:</strong> {{ $category->description ?? 'Sin descripción' }}</p>
            <p>
                <strong>Color:</strong> {{ $category->color ?? 'N/A' }}
                <span class="category-detail__circle"                
                    style=" background-color: {{ $category->color }}; ">
                </span>
            </p>

            <a href="{{ route('categories.index') }}" class="btn btn-info category-detail__btn">
                Volver
            </a>

        </div>
    </div>
</div>
@endsection