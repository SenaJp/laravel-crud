@extends('layout')

@section('header')
Adicionar Tarefa
@endsection

@section('content')

@include('errors', ['errors' => $errors])

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="Task">Tarefa</label>
            <input type="text" class="form-control" name="Task" id="Task">
        </div>
        <button class="btn btn-primary mb-2">Adicionar</button>
    </form>
@endsection

@section('footer')
<style>
    .w-5{
        display:none
    }
</style>
@endsection