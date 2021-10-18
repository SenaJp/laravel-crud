<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TaskFormRequest;

class ToDoController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    $tarefas = Tarefa::where('status', 1)->paginate(2);

        $mensagem = $request->session()->get('mensagem');
        return view('lists.index', [
            'tarefas'=>$tarefas, 'mensagem'=>$mensagem
        ]);
    }


    public function create()
    {
        return view('lists.create');
    }

    public function store(TaskFormRequest $request)
    {
        $new_task = new Tarefa();
        $new_task->task = $request->tarefa;
        $new_task->save();

        $request->session()
        ->flash(
            'mensagem',
            "Tarefa adicionada com sucesso!"
        );

        return redirect()->route('all_tasks');
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

    public function complete_task(request $request, int $id)
    {
        $old_status = $request->status;
        $old_status = Tarefa::find($id);
        $old_status->status = 2;
        $old_status->save();

        $request->session()
        ->flash(
            'mensagem',
            "Tarefa concluída com sucesso!"
        );

        return redirect('/index');
    }

    public function tasks_complete()
    {
        $tarefas = Tarefa::where('status', 2)->get();

        return view('lists.complete', ['tarefas'=>$tarefas]);
    }
}