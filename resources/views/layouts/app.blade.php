<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO LIST</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="header">
        <a href="/"><img src="https://imgs.search.brave.com/kPP975wP-fhyg9lRGHLQK8dF-qukajqT-LWL0P0Lg2w/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9wbmcu/cG5ndHJlZS5jb20v/cG5nLXZlY3Rvci8y/MDI1MDMwNy9vdXJt/aWQvcG5ndHJlZS10/YXNrLW1hbmFnZW1l/bnQtaWNvbi1wbmct/aW1hZ2VfMTU3Mzgx/NTcucG5n" /></a> 
        <a href="/tasks">TAREAS </a> 
        <a href="/categories">CATEGORIAS </a> 
        <a href="/tags">ETIQUETAS </a>
        <br>
    </div>
    @yield('content')
</body>
</html>