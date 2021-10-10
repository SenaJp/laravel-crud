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
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $tarefa->task; }}
                    <form method="POST" action="/index/{{$tarefa->id}}"
                        onsubmit="return confirm('Tem certeza que deseja remover essa tarefa?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
@endsection

