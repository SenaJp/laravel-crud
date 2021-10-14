<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TaskFormRequest;

class LogController extends Controller
{
    public function index()
    {
        return view('login.log');
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()
            ->back()
            ->withErrors('Usuário e/ou senha incorretos');
        }

        return redirect()->route('all_tasks');
    }
}