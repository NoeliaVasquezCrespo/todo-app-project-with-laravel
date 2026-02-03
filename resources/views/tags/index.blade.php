@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/todo-project/tag_style.css') }}">
<div class="container tags">

    <h1 class="tags__title">Lista de Etiquetas</h1>

    @if($tags->isEmpty())
        <p class="tags__empty">No hay etiquetas disponibles.</p>
    @else
        <table class="table tags__table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre etiqueta</th>
                    <th>Color</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <span class="tag-detail__circle"                
                                style=" background-color: {{ $tag->color }}; ">
                            </span>
                        </td>
                        <td class="tags__actions">
                            <a href="#" class="btn btn-info btn-sm tags__btn">Ver</a>
                            <a href="#" class="btn btn-warning btn-sm tags__btn">Editar</a>
                            <a href="#" class="btn btn-danger btn-sm tags__btn">Eliminar</a>
                        </td>    
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>
@endsection