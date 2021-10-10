@extends('layout')

@section('header')
Adicionar tarefa
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="tarefa">Tarefa</label>
            <input type="text" class="form-control" name="tarefa" id="tarefa">
        </div>
        <button class="btn btn-primary mb-2">Adicionar</button>
    </form>
@endsection