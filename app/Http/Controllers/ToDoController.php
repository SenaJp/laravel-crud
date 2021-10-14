<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use App\Http\Requests\TaskFormRequest;

class ToDoController extends Controller
{
    public function index(Request $request)
    {
    $tarefas = Tarefa::all();

        $mensagem = $request->session()->get('mensagem');

        return view('lists.index', ['tarefas'=>$tarefas, 'mensagem'=>$mensagem]);
    }

    public function create()
    {
        return view('lists.create');
    }

    public function store(TaskFormRequest $request) //salvar no banco
    {
        $new_task = new Tarefa();
        $new_task->task = $request->tarefa;
        $new_task->save();

        $request->session()
        ->flash(
            'mensagem',
            "Tarefa {$new_task->id} adicionada com sucesso!"
        );

        return redirect()->route('all_tasks'); //redireciona para o index
    }

    Public function destroy(Request $request){
        Tarefa::destroy($request->id);
        $request->session()
            ->flash(
            'mensagem',
            "A tarefa foi removida com sucesso!"
             );
        return redirect()->route('all_tasks');
    }

    public function editTask(int $id, Request $request)
    {
        $new_task = $request->name;
        $task = Tarefa::find($id);
        $task -> task = $new_task;
        $task->save();
    }

}