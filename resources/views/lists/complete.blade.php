@extends('layout')

@section('header')
Tarefas concluídas
@endsection

@section('content')



@foreach($tarefas as $tarefa)
<div>
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="task-status-{{ $tarefa->status }}">{{ $tarefa->task}}</span>
    </div>
@endforeach
@endsection