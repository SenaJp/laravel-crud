@extends('layout')

@section('header')
Resultado da pesquisa:
@endsection

@section('content')

@foreach($Tasks as $Task)
<div>
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="task-status-{{ $Task->status }}">{{ $Task->task}}</span>
    </div>
@endforeach
<div class="mt-2">{{ $Tasks->appends(request()->input())->links(); }}</div>
@endsection