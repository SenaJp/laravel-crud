@extends('layout')



@section('header')
Gerenciador de Tarefas 📚
@endsection

@section('content')

@if (!empty($message))
<div class="alert alert-success">{{ $message }}</div>
@endif

<div class="d-flex">
<div class="p-2"><a href="/index/criar" class="btn btn-dark mb-2">Adicionar Tarefa</a></div>
<div class="p-2"><a href="/TasksCompletas" class="btn btn-success mb-2">Tarefas completas</a></div>
<div class="ml-auto p-2"><form action = "index/search" method="get" class="for form inline">
    @csrf
    <input type="text" name="filter" placeholder="Buscar por tarefa" class="form-control" required>
    <span class="mt-2"><button type="submit" class="btn btn-info mt-2 align-right">Pesquisar</button>
</form></div>
</div>

<p class="lead">Tarefas incompletas:</p>
            @foreach($Tasks as $Task)
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span id="task-name-{{ $Task->id }}">{{$Task->task}}</span>
                    <div class="input-group w-50" hidden id="input-task-name-{{ $Task->id }}">
                        <input type="text" class="form-control" value="{{ $Task->task }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" onclick="editTask({{ $Task->id }})">
                                <i class="fas fa-check"></i>
                            </button>
                            @csrf
                        </div>
                    </div>

                    <span class="d-flex">
                        <form method="POST" action="/index/{{$Task->id}}/completarTask"
                        onsubmit="return confirm('Tem certeza que deseja concluir a tarefa?')">
                        <button class="btn btn-success btn-sm mr-1">
                        <i class="fas fa-check-circle"></i>
                            @csrf
                         </form>

                    <span class="d-flex">
                        <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $Task->id }})">
                            <i class="fas fa-edit"></i>
                        </button>

                    <form method="POST" action="/index/{{$Task->id}}"
                        onsubmit="return confirm('Tem certeza que deseja remover essa Task?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </li>
            @endforeach

        </ul>
<script>
    function  toggleInput(taskId) {
        const nameTaskEl = document.getElementById(`task-name-${taskId}`);
        const inputTaskEl = document.getElementById(`input-task-name-${taskId}`);

       if (nameTaskEl.hasAttribute('hidden'))
       {
            nameTaskEl.removeAttribute('hidden');
            inputTaskEl.hidden = true;
       } else {
            inputTaskEl.removeAttribute('hidden');
            nameTaskEl.hidden = true;
        }
    }
    function editTask(taskId) {
        let formData = new FormData();
        const name = document.
        querySelector(`#input-task-name-${taskId} > input`)
        .value;

        const token = document.querySelector('input[name="_token"]').value;

        formData.append('name', name);
        formData.append('_token', token);

        const url = `/index/${taskId}/editaTask`;
        fetch(url, {
            method: 'POST',
            body: formData
        }). then(() => {
            toggleInput (taskId);
            document.getElementById(`task-name-${taskId}`).textContent = name;
        });
    }
</script>
@endsection

@section('footer')
{{ $Tasks->links() }}
@endsection
