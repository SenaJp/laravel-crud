@extends('layout')

@section('header')
To Do List!
@endsection

@section('content')

@if (!empty($mensagem))
<div class="alert alert-success"> {{ $mensagem }}</div>
@endif

<a href="/index/criar" class="btn btn-dark mb-2">Adicionar tarefa</a>
        <ul class="list-group">
            @foreach($tarefas as $tarefa)
                <li class="list-group-item"> {{ $tarefa->task; }}
                    <form method="POST" action="/index/{{$tarefa->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Excluir</button>
                    </form>
                </li>
            @endforeach
        </ul>
@endsection

