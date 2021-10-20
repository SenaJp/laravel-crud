@extends('layout')

@section('header')
Resultado da pesquisa:
@endsection

@section('content')

@foreach($tarefas as $tarefa)
<div>
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="task-status-{{ $tarefa->status }}">{{ $tarefa->task}}</span>
    </div>
@endforeach
<div class="mt-2">{{ $tarefas->appends(request()->input())->links(); }}</div>
@endsection