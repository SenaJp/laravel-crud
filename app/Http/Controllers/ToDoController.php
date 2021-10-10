<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Tarefa;
use Illuminate\Http\Request;

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
        $task = $request->tarefa;
        $new_task = new Tarefa();
        $new_task->task =$task;
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
}
