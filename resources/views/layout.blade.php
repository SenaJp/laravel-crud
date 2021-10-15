<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <title>List Control</title>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark mb-2">
        <a class="navbar-brand" href="/index">Home</a>
        @auth
        <a type="button" class="btn btn-danger btn-sm" href="/logout">Sair</a>
        @endauth
      
      </nav>

<div class="container">
    <div class="jumbotron">
        <h1>@yield('header')</h1>
    </div>
        @yield('content')
</div>


</body>
</html>