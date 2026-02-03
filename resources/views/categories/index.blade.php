@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/todo-project/category_style.css') }}">

<div class="container categories">

    <h1 class="categories__title">Lista de Categorías</h1>
    <br>

     <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
                Crear nueva categoría </a>
                
    @if($categories->isEmpty())
        <p class="categories__empty">No hay categorías disponibles.</p>
    @else
        <table class="table categories__table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre categoría</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="categories__actions">
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm">
                                Ver
                            </a>

                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm categories__btn">
                                Editar
                            </a>
                            <a href="#" class="btn btn-danger btn-sm categories__btn">Eliminar</a>
                        </td>    
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>
@endsection
