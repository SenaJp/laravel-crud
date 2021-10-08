<?php

namespace App\Http\Controllers;
use App\Tarefa;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index()
    {
    $tarefas = Tarefa::all();
    return view('lists.index', ['tarefas'=>$tarefas]); //como faço para puxar a variável do index?

    }

    public function create()
    {
        return view('lists.create');
    }

    public function store(Request $request) //salvar no banco
    {

        $task = $request->tarefa;
        $new_task = new Tarefa();
        $new_task->task =$task;
        $new_task->save();


    }
}
