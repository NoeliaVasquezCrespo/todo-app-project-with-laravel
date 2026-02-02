<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO LIST</title>
    <link rel="stylesheet" href="{{ asset('css/welcome_style.css') }}">
</head>

<body>
    <div class="todo-app">
        <header class="todo-app__header">
            <h1 class="todo-app__title">PROYECTO TODO LIST</h1>
            <p class="todo-app__subtitle">APLICACIÓN DE GESTIÓN DE TAREAS</p>
        </header>

        <section class="todo-app__info">
            <h3>Bienvenido a la aplicación de gestión de tareas</h3>
            <p>Esta aplicación te permite crear, organizar y gestionar tus tareas de manera eficiente.
        </section>

        <section class="todo-app__button">
            <button class="todo-app__button--categories"> 
                <a href="/categories" style="text-decoration: none; color: white;"> Ver todas las categorías </a>
            </button>
        </section>
    </div>

</body>

</html>