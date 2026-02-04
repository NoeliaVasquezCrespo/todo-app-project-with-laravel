@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/todo-project/tag_style.css') }}">
@endpush

@section('content')
<div class="container tag-detali">
    <h1 class="tag-detail__title">Detalle de Etiqueta</h1>

    <div class="tag-detail__card card mt-3">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $tag->id }}</p>
            <p><strong>Nombre etiqueta:</strong> {{ $tag->name }}</p>
            <p><strong>Descripción etiqueta:</strong> {{ empty(trim($tag->description)) ? 'Sin descripción' : $tag->description }}</p>
            <p>
                <strong>Color:</strong> {{ $tag->color ?? 'N/A' }}
                <span class="tag-detail__circle"                
                    style=" background-color: {{ $tag->color }}; ">
                </span>
            </p>

            <a href="{{ route('tags.index') }}" class="btn btn-info tag-detail__btn">
                Volver
            </a>
        </div>
    </div>
</div>
@endsection