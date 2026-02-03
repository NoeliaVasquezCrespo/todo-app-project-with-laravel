@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/todo-project/tag_style.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container tags">

    <h1 class="tags__title">Lista de Etiquetas</h1>
    <br>

     <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">
                Crear nueva etiqueta </a>

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
                            <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-info btn-sm">
                                Ver
                            </a>
                            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning btn-sm tags__btn">
                                Editar
                            </a>
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que desea eliminar la etiqueta?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>    
                    </tr>
                @endforeach
            </tbody>
        </table>

         @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6'
                });
            </script>
        @endif
        
    @endif

</div>
@endsection