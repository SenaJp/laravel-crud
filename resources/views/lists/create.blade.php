@extends('layout')

@section('header')
Adicionar tarefa
@endsection

@section('content')
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="tarefa">Tarefa</label>
            <input type="text" class="form-control" name="tarefa" id="tarefa">
        </div>
        <button class="btn btn-primary mb-2">Adicionar</button>
    </form>
@endsection