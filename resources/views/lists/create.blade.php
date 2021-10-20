@extends('layout')

@section('header')
Adicionar tarefa
@endsection

@section('content')

@include('errors', ['errors' => $errors])


    <form method="post">
        @csrf
        <div class="form-group">
            <label for="tarefa">Tarefa</label>
            <input type="text" class="form-control" name="tarefa" id="tarefa">
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