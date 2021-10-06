@extends('layout')

@section('header')
To Do List!
@endsection

@section('content')
<a href="/index/criar" class="btn btn-dark mb-2">Adicionar tarefa</a>
        <ul class="list-group">
            <?php foreach ($listas as $lista): ?>
                <li class="list-group-item"> <?= $lista ?> </li>
            <?php endforeach; ?>
        </ul>
@endsection
