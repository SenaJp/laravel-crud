<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\TaskFormRequest;

class ToDoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $Tasks = Task::where('status', 1)->where('user_id', auth()->id())->paginate(20);

        $message = $request->session()->get('mensagem');
        return view('lists.index', [
            'Tasks'=>$Tasks, 'mensagem'=>$message
        ]);
    }


    public function create()
    {
        return view('lists.create');
    }

    public function store(TaskFormRequest $request)
    {
        $new_task = new Task();
        $new_task->task = $request->Task;
        $new_task->user_id = auth()->id();
        $new_task->save();

        $request->session()
        ->flash(
            'mensagem',
            "Task adicionada com sucesso!"
        );

        return redirect()->route('all_tasks');
    }

    public function destroy(Request $request)
    {
        Task::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "A Task foi removida com sucesso!"
            );
        return redirect()->route('all_tasks');
    }

    public function editTask(int $id, Request $request)
    {
        $new_task = $request->name;
        $task = Task::find($id);
        $task -> task = $new_task;
        $task->save();
    }

    public function complete_task(request $request, int $id)
    {
        $old_status = $request->status;
        $old_status = Task::find($id);
        $old_status->status = 2;
        $old_status->save();

        $request->session()
        ->flash(
            'mensagem',
            "Task concluída com sucesso!"
        );

        return redirect('/index');
    }

    public function tasks_complete()
    {
        $Tasks = Task::where('status', 2)->where('user_id', auth()->id())->paginate(20);

        return view('lists.complete', ['Tasks'=>$Tasks]);
    }

    public function search(Request $request)
    {
        $search = $request->filter;
        $result = Task::where([['task', 'like', '%'.$search.'%']])
                        ->where('user_id', auth()->id())
                        ->where('status', '=', 1)
                        ->paginate(20);

       return view('lists.search', [
        'Tasks'=>$result
    ]);
    }

    public function searchComplete(Request $request)
    {
        $search = $request->filter;
        $result = Task::where([['task', 'like', '%'.$search.'%']])
                        ->where('user_id', auth()->id())
                        ->where('status', '=', 2)
                        ->paginate(20);

       return view('lists.search', [
        'Tasks'=>$result
    ]);
    }
}