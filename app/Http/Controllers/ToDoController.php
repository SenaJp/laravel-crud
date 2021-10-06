<?php

namespace App\Http\Controllers;

class ToDoController extends Controller
{
    public function index(){
    $listas = [
        'Test 1',
        'Test 2',
        'Test 3'
    ];
    return view ('lists.index' , ['listas'=> $listas]);
    }

    public function create()
    {
        return view('lists.create');
    }

    public function store(Request $request)
    {
        $name = $request->tarefa;
        $tarefa = new tarefa();
        $tarefa->name = $name;
        var_dump($tarefa->save());

    }
}
