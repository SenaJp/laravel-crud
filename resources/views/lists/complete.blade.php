@extends('layout')

@section('header')
Tarefas concluídas ✔️
@endsection

@section('content')


<div class="d-flex flex-column">
    <div>
        <form action = "index/searchComplete" method="get" class="for form inline">
            @csrf
            <input type="text" name="filter" placeholder="Filtrar tarefas concluídas" class="form-control" required>
            <button type="submit" class="btn btn-info mt-2">Pesquisar</button>
        </form>
    </div>
<hr>

@foreach($Tasks as $Task)
<div>
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="task-status-{{ $Task->status }}">{{ $Task->task}}</span>
</div>
@endforeach
<div class="mt-2">{{ $Tasks->links() }}</div>
@endsection